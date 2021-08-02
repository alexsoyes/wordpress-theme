<?php
/**
 * Generates a simple table of contents (ToC).
 */

function get_the_replaced_heading( ?array $match ): string {
	if ( ! $match ) {
		return "";
	}

	$heading_id = sanitize_title_with_dashes( remove_accents( ( $match[3] ) ) );
	$svg        = "<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 512 512'><title>Faire un lien vers \"$match[3]\"</title><path d='M208 352h-64a96 96 0 010-192h64M304 160h64a96 96 0 010 192h-64M163.29 256h187.42' fill='none' stroke='currentColor' stroke-linecap='round' stroke-linejoin='round' stroke-width='36'/></svg>";

	return "<h$match[1] id=\"$heading_id\"$match[2]><a href=\"#$heading_id\" aria-hidden=\"true\">$svg</a>$match[3]</h$match[1]>";
}

function the_content_with_toc( string $content, string $headers = '2,3' ): string {

	// only filters posts.
	if ( ! is_single() ) {
		return $content;
	}

	return preg_replace_callback(
		'#<h([' . $headers . '])(.*?)>(.*?)</h\1>|<!--nextpage-->#',
		'get_the_replaced_heading',
		$content
	);
}

add_filter( 'the_content', 'the_content_with_toc' );
