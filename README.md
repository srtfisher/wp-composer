WordPress Composer
=============

Adding Composer dependency management to WP CLI.

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

### Who's behind this little project?
It's just [Sean Fisher](http://github.com/srtfisher) for now! We love the guys and gals from [WP CLI](https://github.com/wp-cli/wp-cli) too!

### How do I install this?
Simple! If you have WP CLI installed (you should), just run this command:

`wp plugin install composer --activate`

If not, you can just download it from clicking on the "ZIP" download button above. Just unzip the file and move it to `wp-content/plugins/`. Everything should be located at `wp-content/plugins/composer`!

After you install it, try running `wp composer` and you should get a great interface to composer management inside of WP CLI.

### License?
GPLv2 or later