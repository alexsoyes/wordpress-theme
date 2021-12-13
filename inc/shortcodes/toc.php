<?php

/**
 * A beautiful toc on single posts!
 *
 * @todo move outside the theme
 */

add_shortcode(
	'soyes_toc',
	function ( $atts = array() ) {
		$heading_to_target = is_array( $atts ) && array_key_exists( 'headers', $atts ) ? $atts['headers'] : '2';

		$toc_class = 'toc';

		// "toc_full" changes the frontend style.
		if ( $heading_to_target !== '2' ) {
			$toc_class = 'toc toc_full';
		}

		preg_match_all(
			'#<h([' . $heading_to_target . ']).*?>(.*?)</h\1>#',
			get_the_content(),
			$headings
		);

		$headings_count   = count( $headings[0] );
		$headings_element = $headings[1];
		$headings_text    = $headings[2];
		$elementsToClose  = 0;

		$output = "<div class=\"$toc_class wp-block-columns alignfull\">\n\t<ol>\n";

		for ( $i = 0; $i < $headings_count; $i ++ ) {
			$currentText = wp_strip_all_tags( $headings_text[ $i ] );
			$currentHref = urlencode( sanitize_title_with_dashes( remove_accents( ( $currentText ) ) ) );
			$currentH    = $headings_element[ $i ];
			$previousH   = $headings_element[ $i - 1 ];

			$currentLink = sprintf( "<a href=\"%s\">%s</a>", "#$currentHref", $currentText );

			if ( $i === 0 ) {
				$output .= sprintf( "\t<li class=\"%s\">%s", "toc_$currentH", $currentLink );
				continue;
			}

			if ( $currentH > $previousH ) { // the previous title is higher h2 > h3.
				$output .= "\n<ol class='toc_sublist'>\n\t\t<li class='toc_$currentH'>\n\t\t$currentLink";
				$elementsToClose ++;
			} elseif ( $previousH > $currentH ) { // the previous title is lower h4 > h2.
				// close all opened li before closing the list.
				for ( $l = 0; $l < $elementsToClose; $l ++ ) {
					$output .= "\t</li>\n</ol>";
				}
				$elementsToClose = 0;
				$output          .= "</li>\n\t<li class='toc_$currentH'>$currentLink";
			} else { // the previous title is the same h2 = h2.
				$output .= "</li>\n\t<li class='toc_$currentH'>$currentLink";
			}
		}

		// simply close the last element
		if ( isset( $elementsToClose ) ) {
			// close all opened li before closing the list.
			for ( $l = 0; $l < $elementsToClose; $l ++ ) {
				$output .= '</li></ol>';
			}
		}

		$output .= "\n</ol></div>";

		return wp_kses_post( $output );
	}
);
