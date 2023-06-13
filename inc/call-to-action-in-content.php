<?php

function add_call_to_action_to_content(string $content): string
{
    if (is_single() && in_the_loop() && is_main_query() && (get_post_type() !== 'conseil')) {
        // get every h2 html tag from the content
        $matches = [];
        preg_match_all('/<h2.*?>(.*?)<\/h2>/s', $content, $matches);

        $ctasToAdd = [
            'newsletter-cta',
            'free-lesson-freelance',
            'button-cta-a',
            'course-copilot',
            'course-freelance',
            'button-cta-b',
            'free-lesson-ai',
        ];

        // 7 CTA per page
        $numberOfH2InPage = count($matches[0]);
        $numberOfCTAsToAdd = count($ctasToAdd);

        // only add the first and last one if there is not enought h2
        if ($numberOfH2InPage < $numberOfCTAsToAdd) {
            $content = str_replace(
                $matches[0][0],
                sprintf(
                    '<aside class="call-to-action course-cta">%s</aside>%s',
                    soyes_load_template_part('template-parts/cta/newsletter-cta'),
                    $matches[0][0]
                ),
                $content,
            );

            $content = str_replace(
                $matches[0][$numberOfH2InPage - 1],
                sprintf(
                    '<aside class="call-to-action course-cta">%s</aside>%s',
                    soyes_load_template_part('template-parts/cta/' . $ctasToAdd[(rand(1, count($ctasToAdd) - 1))]),
                    $matches[0][$numberOfH2InPage - 1]
                ),
                $content,
            );

            return $content;
        }

        // add CTA before every h2
        $displayCTAEveryXH2 = floor($numberOfH2InPage / $numberOfCTAsToAdd);

        for ($i = 0; ($i < $numberOfCTAsToAdd && $i < $numberOfH2InPage); $i++) {
            $template_part = soyes_load_template_part('template-parts/cta/' . $ctasToAdd[$i]);

            $template_part = str_replace('h3', 'div', $template_part);

            $content = str_replace(
                $matches[0][$i * $displayCTAEveryXH2],
                sprintf(
                    '<aside class="call-to-action course-cta">%s</aside>%s',
                    $template_part,
                    $matches[0][$i * $displayCTAEveryXH2]
                ),
                $content,
            );
        }
    }

    return $content;
}

add_filter('the_content', 'add_call_to_action_to_content', 100);