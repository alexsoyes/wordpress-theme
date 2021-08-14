<?php

/**
 * The main template file
 */

get_header();

if (have_posts()) {
    while (have_posts()) {
        the_post();

        get_template_part('template-parts/content/content', get_post_type());
    }
}

get_footer();
