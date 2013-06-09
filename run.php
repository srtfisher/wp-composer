<?php
use Composer\Console\Application;
require_once(__DIR__.'/class.php');

$instance = WpComposer::Instance();
$instance->boot();

/**
 * Composer Command for WP-CLI
 *
 * @package wp-cli
 * @subpackage commands/third-party
 * @maintainer Sean Fisher
 */
class Composer_Command extends WP_CLI_Command {
	public function install()
	{

		$instance = WpComposer::Instance();
		$instance->recursiveExecution(function($path, $data, $is_plugin, $is_theme)
		{
			WP_CLI::line(sprintf('Starting to process %s', end(explode('/', $path))));

			$_SERVER['argv'] = array('composer', 'install');

			// Run the Composer command.
			$application = new Application();
			$application->setAutoExit(false);
			$application->run();

			WP_CLI::success('Finished processing');
		});
	}

	public function update()
	{
		$instance = WpComposer::Instance();
		$instance->recursiveExecution(function($path, $data, $is_plugin, $is_theme)
		{
			WP_CLI::line(sprintf('Starting to process %s', end(explode('/', $path))));

			$_SERVER['argv'] = array('composer', 'update');

			// Run the Composer command.
			$application = new Application();
			$application->setAutoExit(false);
			$application->run();

			WP_CLI::success('Finished processing');
		});
	}

	public function diagnose()
	{
		$instance = WpComposer::Instance();
		$instance->recursiveExecution(function($path, $data, $is_plugin, $is_theme)
		{
			WP_CLI::line(sprintf('Starting to process %s', end(explode('/', $path))));

			$_SERVER['argv'] = array('composer', 'diagnose');

			// Run the Composer command.
			$application = new Application();
			$application->setAutoExit(false);
			$application->run();

			WP_CLI::success('Finished processing');
		});
	}

	public function status()
	{
		$instance = WpComposer::Instance();
		return $instance->run();
	}


	public function about()
	{
		$instance = WpComposer::Instance();
		return $instance->run();
	}

	public function version()
	{
		WP_CLI::line('wp-composer version: '.WpComposer::$version);
	}
}

WP_CLI::add_command('composer', 'Composer_Command');
