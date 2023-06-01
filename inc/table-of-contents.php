<?php

/**
 * Generates a simple table of contents (ToC).
 */

function get_the_replaced_heading(?array $match): string
{
    if (!$match) {
        return "";
    }
    $heading_id = urlencode(sanitize_title_with_dashes(remove_accents(($match[3]))));

    return "<h$match[1] id=\"$heading_id\"$match[2]>$match[3]</h$match[1]>";
}

function the_content_with_toc(string $content): string
{
    if (is_single() && in_the_loop() && is_main_query()) {

        $unique_headings_number = '2,3';

        return preg_replace_callback(
            '#<h([' . $unique_headings_number . '])(.*?)>(.*?)<\/h\1>|<!--nextpage-->#',
            'get_the_replaced_heading',
            $content
        );
    }

    return $content;
}

add_filter('the_content', 'the_content_with_toc', 100);