<?php
/**
 * Plugin Name: AMSVA Reading Time
 * Description: Adds an estimated reading time to WordPress posts, with options to customize the display and settings in the WordPress dashboard.
 * Version: 1.0.0
 * Author: AMSVA
 * Text Domain: amsva-reading-time
 * License: GPLv2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

defined('ABSPATH') || exit;

include_once plugin_dir_path(__FILE__) . 'functions.php';
include_once plugin_dir_path(__FILE__) . 'admin-settings.php';

/**
 * Set default options on plugin activation
 */
function amsva_set_default_options() {
    add_option('amsva_display_reading_time', 'yes');
    add_option('amsva_tag', 'span');
    add_option('amsva_suffix', __('minutes', 'amsva-reading-time'));
    add_option('amsva_label', __('Reading Time: ', 'amsva-reading-time'));
    add_option('amsva_words_per_minute', 200);
}

register_activation_hook(__FILE__, 'amsva_set_default_options');

/**
 * Add settings link on the plugins page
 */
function amsva_plugin_settings_link($links) {
    $settings_link = '<a href="' . admin_url('options-general.php?page=amsva-settings') . '">' . __('Settings', 'amsva-reading-time') . '</a>';
    array_unshift($links, $settings_link);
    return $links;
}

add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'amsva_plugin_settings_link');

