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
	}

	private function getDirectories()
	{
		$path = WP_PLUGIN_DIR;
		var_dump($path);
		exit;
	}
}