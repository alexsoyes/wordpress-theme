<?php
/**
 *
 */

function soyes_get_the_main_category(): ?WP_Term {
	$categories = get_the_category();

	if ( ! empty( $categories ) ) {
		return $categories[0];
	}

	return null;
}
