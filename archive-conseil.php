<?php

/**
 * Display "archive" page with "conseils".
 */

get_header();

if (have_posts()) {
    get_template_part('template-parts/content/content', 'conseil');
}

get_footer();
