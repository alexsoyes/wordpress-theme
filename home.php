<?php

/**
 * Display "blog" page with categories.
 */

get_header();

if (have_posts()) {
    get_template_part('template-parts/content/content', 'home');
}

get_footer();
