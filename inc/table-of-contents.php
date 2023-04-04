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
    $svg = "<svg width='32' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>" . sprintf(
        /* translators: %s is replace with the title of the block. */
            __('Make a link to: %s', 'soyes'), wp_strip_all_tags($match[3])) . "</title><path d='M208 352h-64a96 96 0 010-192h64M304 160h64a96 96 0 010 192h-64M163.29 256h187.42' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='36'/></svg>";

    return "<div class=\"toc-title-container toc-title-h$match[1]\"><span data-href=\"#$heading_id\" class=\"toc_ref toc_link\">#</span><h$match[1] id=\"$heading_id\"$match[2]>$match[3]</h$match[1]></div>";
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