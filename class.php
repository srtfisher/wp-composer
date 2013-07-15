<?php
use Composer\Console\Application;

/**
 * Shared Group of Functions for WP-CLI Composer
 *
 * @package wp-cli
 * @subpackage commands/third-party
 * @maintainer Sean Fisher
 */
class WpComposer {
	public $loader;
	private $argv;
	private $backupArgv;

	private static $Instance;
	public static $version = '0.1.2';

	public static function Instance()
	{
		if (self::$Instance == NULL)
			self::$Instance = new WpComposer;

		return self::$Instance;
	}
	public function boot()
	{
		$this->loader = require_once(__DIR__ . '/vendor/autoload.php');

		$this->setupArgv();
	}

	private function setupArgv()
	{
		if ($this->argv !== NULL) return;

		$this->argv = $this->backupArgv = $_SERVER['argv'];

		//array_shift($this->argv);
		array_shift($this->argv);
		$_SERVER['argv'] = $this->argv;
	}

	public static function argv()
	{
		return self::Instance()->getArgv();
	}

	public function getArgv() { return $this->argv; }

	/**
	 * Standard Running the Composer Command
	 * 
	 * @return object
	 */
	public function run()
	{
		// Run the Composer command.
		$application = new Application();
		$application->setAutoExit(false);
		$application->run();

		return $this->loader;
	}

	/**
	 * Execute a composer command for all the themes and plugins
	 *
	 * @param object a callback function to execute for each function
	 */
	public function recursiveExecution($callback)
	{
		if (! is_callable($callback))
			die('Not a valid callback.');

		$directories = $this->getDirectories();
		$initialDir = getcwd();

		foreach($directories as $dir => $data) :
			chdir($dir);

			$is_theme = (is_object($data) AND get_class($data) == 'WP_Theme') ? TRUE : FALSE;
			$is_plugin = ! $is_theme;

			call_user_func_array($callback, array($dir, $data, $is_plugin, $is_theme));
		endforeach;

		chdir($initialDir);
	}

	/**
	 * Retrieve the Directories to act upon
	 * 
	 * @return array Array of plugins or WP_Theme objects
	 */
	private function getDirectories()
	{
		$index = array();

		$plugins = apply_filters( 'all_plugins', get_plugins() );
		if (count($plugins) > 0) : foreach($plugins as $path => $data) :
			$filteredPlugin = $this->filterPlugin($path);

			if ($filteredPlugin !== NULL AND $this->shouldUsePath($filteredPlugin))
				$index[$filteredPlugin] = $data;
		endforeach; endif;

		// Themes
		$themes = wp_get_themes();
		$themes_root = get_theme_root().'/';

		if (count($themes) > 0) : foreach($themes as $path => $data) :
			if ($this->shouldUsePath($themes_root.$path))
				$index[$themes_root.'/'.$path] = $data;
		endforeach; endif;

		return apply_filters('wp_composer_paths', $index);
	}

	/**
	 * Internally Filter the plugin's path
	 *
	 * @return null|string Null for a plugin not to be included
	 */
	private function filterPlugin($plugin)
	{
		// We don't want to have this function included, the whole system will fail
		if ($plugin == 'composer/composer.php' OR $plugin == 'wp-composer/composer.php')
			return NULL;

		// They're not in a single file, cannot support them
		if (dirname(WP_PLUGIN_DIR.'/'.$plugin) == WP_PLUGIN_DIR)
			return NULL;
		else
			return WP_PLUGIN_DIR.'/'.dirname($plugin);
	}

	/**
	 * See if we should include a path if they don't have a composer.json
	 * 
	 * @param string
	 * @return bool
	 */
	private function shouldUsePath($path)
	{
		if (! file_exists($path.'/composer.json'))
			return FALSE;
		else
			return TRUE;
	}
}
