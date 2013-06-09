<?php

require_once(__DIR__.'/class.php');
WpComposer::boot();

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

	}

	public function update()
	{

	}

	public function status()
	{

	}

	public function about()
	{
		
	}
}

WP_CLI::add_command('composer', 'Composer_Command');
