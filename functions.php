<?php
defined('ABSPATH') || exit;

/**
 * Calculate reading time
 */
function amsva_calculate_reading_time($content) {
    $word_count = str_word_count(wp_strip_all_tags($content));
    $reading_speed = get_option('amsva_words_per_minute', 200);
    $minutes = ceil($word_count / $reading_speed);

    return $minutes;
}

/**
 * Automatically add reading time to post content if enabled
 */
function amsva_add_reading_time_to_content($content) {
    if (is_single() && get_option('amsva_display_reading_time', 'yes') === 'yes') {
        $minutes = amsva_calculate_reading_time($content);
        $tag = get_option('amsva_tag', 'span');
        $suffix = get_option('amsva_suffix', __('minutes', 'amsva-reading-time'));
        $reading_time = "<{$tag} class='amsva-reading-time'>" . esc_html__('Reading Time: ', 'amsva-reading-time') . esc_html($minutes) . " " . esc_html($suffix) . "</{$tag}>";

        return $reading_time . $content;
    }

    return $content;
}

add_filter('the_content', 'amsva_add_reading_time_to_content');

/**
 * Register shortcode to manually display reading time
 */
function amsva_reading_time_shortcode($atts) {
    $atts = shortcode_atts(
        array(
            'tag' => get_option('amsva_tag', 'span'),
            'suffix' => get_option('amsva_suffix', __('minutes', 'amsva-reading-time')),
        ),
        $atts,
        'amsva_reading_time'
    );

    global $post;
    $minutes = amsva_calculate_reading_time($post->post_content);
    
    // Optional: Customize message based on page type
    if (is_single()) {
        $label = __('Reading Time: ', 'amsva-reading-time');
    } elseif (is_home() || is_archive()) {
        $label = __('Approx. Read: ', 'amsva-reading-time');
    } else {
        $label = __('Read Time: ', 'amsva-reading-time');
    }

    return "<" . esc_attr($atts['tag']) . " class='amsva-reading-time'>" . esc_html($label) . esc_html($minutes) . " " . esc_html($atts['suffix']) . "</" . esc_attr($atts['tag']) . ">";
}

add_shortcode('amsva_reading_time', 'amsva_reading_time_shortcode');



