<?php

/**
 * A beautiful toc on single posts!
 *
 * @todo move outside the theme
 */

add_shortcode(
    'soyes_toc',
    function ($atts = array()) {
        // separate the rest of the content in two columns after main toc
        $output = '
            <div class="wp-block-columns">
                <div class="wp-block-column" id="column-content" style="flex-basis: 66.66%;">';

        return wp_kses_post($output);
    }
);
