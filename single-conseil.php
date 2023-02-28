<?php

/**
 * The display a "conseil"
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();

        get_template_part('template-parts/content/content', 'simple');
    }
}

get_footer();
