<?php
/**
 *
 */

function soyes_get_the_main_category(): ?string {
	$categories = get_the_category();

	if ( ! empty( $categories ) ) {
		return esc_html( $categories[0]->name );
	}
}