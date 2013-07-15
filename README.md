WordPress Composer
=============

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

```php
<?php
// Start the plugin...
require(__DIR__.'/vendor/autoload.php');
?>
```

It's that simple.

### Who's behind this little project?
It's just [Sean Fisher](http://github.com/srtfisher) for now! We love the guys and gals from [WP CLI](https://github.com/wp-cli/wp-cli) too!

### How do I install this?
Simple! If you have WP CLI installed (you should), just run this command:

`wp plugin install composer --activate`

If not, you can just download it from clicking on the "ZIP" download button above. Just unzip the file and move it to `wp-content/plugins/`. Everything should be located at `wp-content/plugins/composer`!

After you install it, try running `wp composer` and you should get a great interface to composer management inside of WP CLI.

### License?
GPLv2 or later

## Change Log
* **0.1:** Initial Commit
* **0.1.1 and 0.1.2:** Bug fix and adding better documentation

## How to install?
Pulling the ZIP from GitHub **will not work** on its own! You have to also setup the composer dependencies from this plugin for it to work. But luckily, there are other ways to skip this.

### Using WP-CLI
We love WP-CLI and it's amazingly easy to install and activate the plugin with one command. From inside of your WordPress directory, run this command:

```bash
wp plugin install composer --activate
```

### Using WordPress Packagist
We highly reccomend using <http://wpackagist.org/> to install this plugin. We love it and the guys and gals over at [Outlandish Ideas](http://outlandishideas.co.uk/) cannot be thanked enough.

After setting up the new respository, you can add this to your `composer.json`:

```json
{
	"require": {
		"wpackagist/composer": *
	}
}
```

Afterwards, you will of course have to activate the plugin.

### Downloading the WordPress plugin
I've added this package to the WordPress.org plugin listing for you to easily download it inside of WordPress Admin! When you download it from WordPress.org or from inside of your WordPress Admin, it will already be good to go and you don't have to install the plugin at all. All that is needed is for you to activate the `WordPress Composer` plugin.