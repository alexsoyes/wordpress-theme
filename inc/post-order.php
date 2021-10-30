<?php

/**
 * @param WP_Query $query
 */
function soyes_posts_ordering( WP_Query $query ): void {
	if ( is_archive() || is_home() ) {
		$query->set( 'orderby', 'modified' );
	}
}

add_filter( 'pre_get_posts', 'soyes_posts_ordering' );
