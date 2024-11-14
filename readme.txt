=== AMSVA Reading Time ===
**Plugin Name:** AMSVA Reading Time  
**Description:** Adds an estimated reading time to WordPress posts, with options to customize the display and settings in the WordPress dashboard.
**Short Description:** Display estimated reading time for posts and pages.  
**Version:** 1.0.0  
**Author:** Ahmed Mahmoud  
**Author URI:** [https://amsvaservices.com](https://amsvaservices.com)  
**Text Domain:** amsva-reading-time  
**Domain Path:** /languages  
**License:** GPLv2 or later  
**Stable Tag:** 1.0.0  
**Tested Up To:** 6.6  

== Description ==

The AMSVA Reading Time Plugin is a straightforward tool that displays the estimated reading time for your content. This helps readers gauge how much time they need to read an article. The plugin supports shortcodes, widgets, and various customization options to seamlessly integrate with your theme.

**Key Features:**
* Accurate reading time estimation based on word count
* Customizable text labels and display styles
* Compatible with posts, pages, and custom post types

== Installation ==

1. Upload the plugin files to the `/wp-content/plugins/amsva-reading-time` directory, or install the plugin through the WordPress Plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the `[amsva_reading_time]` shortcode in your posts or pages to display the estimated reading time.

== Frequently Asked Questions ==

= How does the plugin calculate reading time? =

The plugin estimates reading time based on the word count of your content. The default average reading speed is 200 words per minute, but this can be adjusted in the settings.

= Can I customize the reading time text? =

Yes! You can change the label text, such as "Reading Time" or "Estimated Time," in the plugin’s settings.

== Changelog ==

= 1.0.0 =
* Initial release with basic reading time estimation.
* Added shortcode support.

== Upgrade Notice ==

= 1.0.0 =
This is the first stable release, adding shortcode support and customizable labels for reading time.

== Markdown Example ==

Enhance your content with estimated reading times:

1. Automatically adds reading time estimations.
2. Customizable to match your theme’s appearance.
3. Lightweight and optimized for performance.

Example shortcode usage:
* `[amsva_reading_time]` displays the reading time estimation within posts and pages.
* To display the reading time in a theme template, use: `<?php echo do_shortcode('[amsva_reading_time]'); ?>`

