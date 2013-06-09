<?php
/*
Plugin Name: WordPress Composer
Version: 0.1-alpha
Description: Adds Composer support to WordPress and WP-CLI
Author: Sean Fisher
Plugin URI: http://wordpress.org/plugins/composer
*/

// Not a WP-CLI Request
if ( !defined('WP_CLI') OR !WP_CLI )
	return;

// Make sure the PHP requirements are met.
$php = '5.3.2';
$current = phpversion();

if (version_compare($current, $php, '<')) {
	die(__(sprintf('Composer requires at least PHP %s in order to run properly. You are currently on PHP %s.', $php, $current)));
} else {
	// Launch it knowing that they won't fail since they are PHP >= 5.3.2
	require_once(__DIR__.'/run.php');
}