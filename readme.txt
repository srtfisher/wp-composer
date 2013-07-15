=== WP Composer ===
Contributors: sean212
Donate link: http://seanfisher.co/donate
Link: http://seanfisher.co/wp-composer
Tags: composer, php, dependency, wp-cli, command line, assets, packagist
Requires at least: 3.3
Tested up to: 3.5.1
Stable tag: 0.1.1
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Adding Composer dependency management to WP CLI.

== Description ==

Adding Composer dependency management to WP CLI. Allows you to recursivly install/update composer packages inside of all of your WordPress plugins and themes.

### What is this using?
This package uses a great piece of software called [WP-CLI](http://wp-cli.org/). It provides a command line interface for WordPress management. We are a plugin providing Composer management inside of WP CLI.

### What's Composer?
It's the greatest thing to happen to the web since GIFs, Drop Shadows and dancing cats. Composer is a dead simple JSON-based dependency manager for PHP. For more information, check out <http://getcomposer.org/>.

### So this is complete Composer support?
No, not exactly! Sadly, I'm building this out and I'm trying to make some sweet WP-CLI and Composer integration. But for now, we only support a few command:

- install
- update
- diagnose
- help
- status

If you'd love to help out, please help! Make a pull request and let's get coding!

### How do I build Composer Management inside of my plugin?
Simple really! You just create a simple `composer.json` file like you would with any Composer project. From there, wp-composer will interface with each plugin/theme that has composer support and it will generate the autoload files, too!

Just include something like this inside your main plugin file:

`require(__DIR__.'/vendor/autoload.php');`

It's that simple.

== Installation ==

1. Upload `/composer/` to the `/wp-content/plugins/` directory
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Interface with it via wp-cli!

== Frequently Asked Questions ==

= What is WP CLI? =

WP-CLI is a set of command-line tools for managing WordPress installations. For more, checkout [http://wp-cli.org/](http://wp-cli.org/).

= What's Composer? =

It's the greatest thing to happen to the web since GIFs, Drop Shadows and dancing cats. Composer is a dead simple JSON-based dependency manager for PHP. For more information, check out <http://getcomposer.org/>.

== Changelog ==

= 0.1 =
* Initial Release
* Provides support for install/update/help/diagnose/status/about

= 0.1.1 and 0.1.2 =
* Bug fixes
* Better documentation