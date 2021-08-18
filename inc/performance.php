<?php

function soyes_performance_setup(): void
{
    remove_action('wp_head', 'rsd_link');
    add_filter('xmlrpc_enabled', '__return_false');

    remove_action('wp_head', 'wp_generator');

    remove_action('wp_head', 'wlwmanifest_link');

    remove_action('wp_head', 'start_post_rel_link', 10);

    remove_action('wp_head', 'parent_post_rel_link', 10);

    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('wp_print_styles', 'print_emoji_styles');
    add_filter('emoji_svg_url', '__return_false');

    remove_action('wp_head', 'wp_shortlink_wp_head', 10);

    // Filters for WP-API version 1.x.
    add_filter('json_enabled', '__return_false');
    add_filter('json_jsonp_enabled', '__return_false');

    // Filters for WP-API version 2.x.
    add_filter('rest_enabled', '__return_false');
    add_filter('rest_jsonp_enabled', '__return_false');

    remove_action('wp_head', 'wc_generator_tag');
}