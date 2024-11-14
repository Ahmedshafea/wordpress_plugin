<?php
defined('ABSPATH') || exit;

/**
 * Register settings and fields for the admin page
 */
function amsva_register_settings() {
    register_setting('amsva_settings_group', 'amsva_display_reading_time');
    register_setting('amsva_settings_group', 'amsva_tag');
    register_setting('amsva_settings_group', 'amsva_suffix');
    register_setting('amsva_settings_group', 'amsva_label');
    register_setting('amsva_settings_group', 'amsva_words_per_minute');

    add_settings_section(
        'amsva_settings_section',
        __('Reading Time Settings', 'amsva-reading-time'),
        'amsva_settings_section_callback',
        'amsva-settings'
    );

    add_settings_field('amsva_display_reading_time', __('Auto Add Reading Time to Posts', 'amsva-reading-time'), 'amsva_display_reading_time_callback', 'amsva-settings', 'amsva_settings_section');
    add_settings_field('amsva_label', __('Reading Time Label', 'amsva-reading-time'), 'amsva_label_callback', 'amsva-settings', 'amsva_settings_section');
    add_settings_field('amsva_suffix', __('Reading Time Suffix', 'amsva-reading-time'), 'amsva_suffix_callback', 'amsva-settings', 'amsva_settings_section');
    add_settings_field('amsva_words_per_minute', __('Words per Minute', 'amsva-reading-time'), 'amsva_words_per_minute_callback', 'amsva-settings', 'amsva_settings_section');
    add_settings_field('amsva_tag', __('HTML Tag for Display', 'amsva-reading-time'), 'amsva_tag_callback', 'amsva-settings', 'amsva_settings_section');
    add_settings_field('amsva_shortcode_info', __('Shortcode Information', 'amsva-reading-time'), 'amsva_shortcode_info_callback', 'amsva-settings', 'amsva_settings_section');
}

add_action('admin_init', 'amsva_register_settings');

function amsva_settings_section_callback() {
    echo '<p>' . esc_html__('Customize how reading time is displayed in posts.', 'amsva-reading-time') . '</p>';
}

// Callback functions for settings fields
function amsva_display_reading_time_callback() {
    $option = get_option('amsva_display_reading_time', 'yes');
    echo '<input type="checkbox" name="amsva_display_reading_time" value="yes" ' . checked('yes', $option, false) . ' /> ' . esc_html__('Enable auto display', 'amsva-reading-time');
}

function amsva_label_callback() {
    $option = get_option('amsva_label', __('Reading Time: ', 'amsva-reading-time'));
    echo '<input type="text" name="amsva_label" value="' . esc_attr($option) . '" />';
}

function amsva_suffix_callback() {
    $option = get_option('amsva_suffix', __('minutes', 'amsva-reading-time'));
    echo '<input type="text" name="amsva_suffix" value="' . esc_attr($option) . '" />';
}

function amsva_words_per_minute_callback() {
    $option = get_option('amsva_words_per_minute', 200);
    echo '<input type="number" name="amsva_words_per_minute" value="' . esc_attr($option) . '" /> ' . esc_html__('words per minute', 'amsva-reading-time');
}

function amsva_tag_callback() {
    $option = get_option('amsva_tag', 'span');
    echo '<input type="text" name="amsva_tag" value="' . esc_attr($option) . '" />';
}

function amsva_shortcode_info_callback() {
    echo '<p>' . esc_html__('Use the following shortcode to display reading time manually in posts:', 'amsva-reading-time') . '</p>';
    echo '<code>' . esc_html('[amsva_reading_time label="Reading Time" suffix="mins"]') . '</code>';
    echo '<p><em>' . esc_html__('Example:', 'amsva-reading-time') . ' </em>' . esc_html__('[amsva_reading_time label="Estimated" suffix="min"]', 'amsva-reading-time') . '</p>';
}

function amsva_add_admin_menu() {
    add_options_page(
        __('Reading Time Settings', 'amsva-reading-time'),
        __('Reading Time', 'amsva-reading-time'),
        'manage_options',
        'amsva-settings',
        'amsva_settings_page'
    );
}

add_action('admin_menu', 'amsva_add_admin_menu');

function amsva_settings_page() {
    ?>
    <div class="wrap">
        <h1><?php echo esc_html__('AMSVA Reading Time Settings', 'amsva-reading-time'); ?></h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('amsva_settings_group');
            do_settings_sections('amsva-settings');
            submit_button(esc_html__('Save Changes', 'amsva-reading-time'));
            ?>
        </form>
    </div>
    <?php
}

