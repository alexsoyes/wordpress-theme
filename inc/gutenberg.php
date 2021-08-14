<?php

/**
 * Disable all colors within Gutenberg.
 */
function soyes_gutenberg_customization(): void {
	add_theme_support( 'editor-color-palette', [] );
	add_theme_support( 'disable-custom-colors' );
}
