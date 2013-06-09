<?php
/**
 * Shared Group of Functions for WP-CLI Composer
 *
 * @package wp-cli
 * @subpackage commands/third-party
 * @maintainer Sean Fisher
 */
class WpComposer {
	private static $loader;

	public static function boot()
	{
		self::$loader = require_once(__DIR__ . '/vendor/autoload.php');
	}
}