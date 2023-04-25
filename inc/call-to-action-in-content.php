<?php

function add_call_to_action_to_content(string $content): string
{
    if (is_single() && in_the_loop() && is_main_query() && (get_post_type() !== 'conseil')) {
        // get every h2 html tag from the content
        $matches = [];
        preg_match_all('/<h2.*?>(.*?)<\/h2>/s', $content, $matches);

        // two CTA per page
        $numberOfCTAToAdd = count($matches[0]) / 3;

        $content = str_replace(
            $matches[0][$numberOfCTAToAdd],
            sprintf('<aside class="call-to-action banner-cta">%s</aside>%s', soyes_load_template_part('template-parts/elements/banner-cta'), $matches[0][$numberOfCTAToAdd]),
            $content,
        );

        $content = str_replace(
            $matches[0][$numberOfCTAToAdd * 2],
            sprintf('<aside class="call-to-action banner-cta">%s</aside>%s', soyes_load_template_part('template-parts/elements/banner-cta'), $matches[0][$numberOfCTAToAdd * 2]),
            $content,
        );
    }

    return $content;
}

add_filter('the_content', 'add_call_to_action_to_content', 100);