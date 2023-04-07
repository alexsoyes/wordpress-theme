<?php /* Template Name: Category template */

get_header();

if (have_posts()) {
    get_template_part('template-parts/content/content', 'template-category');
}

get_footer();
