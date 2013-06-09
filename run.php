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
		$instance->recursiveExecution(function()
		{

		});
	}

	public function update()
	{

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
}

WP_CLI::add_command('composer', 'Composer_Command');
