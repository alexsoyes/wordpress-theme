<?php

/**
 * Disable all colors within Gutenberg.
 */
function soyes_gutenberg_customization(): void {
	add_theme_support( 'editor-color-palette', [] );
	add_theme_support( 'disable-custom-colors' );
}

/**
 * Enable content for "blog" page.
 */
add_action( 'post_edit_form_tag', 'soyes_enable_blogpage_content' );

function soyes_enable_blogpage_content( WP_Post $post ) {
	if ( get_option( 'page_for_posts' ) == $post->ID ) {
		remove_action( 'edit_form_after_title', '_wp_posts_page_notice' );
		add_post_type_support( 'page', 'editor' );
	}
}

