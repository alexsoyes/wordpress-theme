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

if ( have_posts() ) : ?>
    <article>
        <header class="entry-jump entry-content page-header alignwide">
            <h1 class="page-title">
				<?php
				printf(
				/* translators: %s: Search term. */
					esc_html__( 'Results for "%s"', 'twentytwentyone' ),
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
            </h1>
        </header><!-- .page-header -->

        <div class="entry-content">
			<?php get_search_form(); ?>
        </div><!-- .entry-content -->

        <div class="entry-content">
			<?php
			while ( have_posts() ) {
				the_post();

				get_template_part( 'template-parts/elements/card' );
			}
			?>
        </div><!-- .entry-content -->

        <footer class="entry-footer default-max-width">
			<?php
			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'soyes' ) . '">',
					'after'    => '</nav>',
					/* translators: %: Page number. */
					'pagelink' => esc_html__( 'Page %', 'soyes' ),
				)
			);
			?>
        </footer><!-- .entry-footer -->
    </article>

<?php
else :
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
endif;

get_footer();
