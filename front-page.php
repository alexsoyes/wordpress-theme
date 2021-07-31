<?php
/**
 *
 */

get_header();

get_template_part( 'template-parts/header/header-front-page' );

if ( have_posts() ) {
	get_template_part( 'template-parts/content/content', 'front-page' );
}

get_footer();
