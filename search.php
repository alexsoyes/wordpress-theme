<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

get_header();

if ( have_posts() ) {
	get_template_part( 'template-parts/content/content', 'search' );
} else {
	?>
    <div class="search-result-count default-max-width">
		<?php
		printf(
			esc_html(
			/* translators: %d: The number of search results. */
				_n(
					'We found %d result for your search.',
					'We found %d results for your search.',
					(int) $wp_query->found_posts,
					'twentytwentyone'
				)
			),
			(int) $wp_query->found_posts
		);
		?>
    </div><!-- .search-result-count -->
	<?php
}

get_footer();
