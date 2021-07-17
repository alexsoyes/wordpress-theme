<?php

add_shortcode( 'soyes_toc', function ( $atts = array() ) {

	$toc = new SoYes_Table_Of_Contents();

	global $post;
	$toc_headers = is_array( $atts ) && array_key_exists( 'headers', $atts ) ? $atts['headers'] : 2;
	$toc->set_post( $post, $toc_headers );

	$post_toc = $toc->get_toc();

	if ( $post_toc ) {
		return wp_kses_post( $post_toc );
	}
} );
