<?php
/**
 * The template for displaying search results pages.
 */

get_header();
?>

    <article>
        <header class="entry-content page-header alignwide">
            <h1 class="page-title">
				<?php

				printf(
					esc_html(
					/* translators: %d: The number of search results. */
						_n(
							'We found %d result for your search "%s".',
							'We found %d results for your search "%s".',
							(int) $wp_query->found_posts,
							'soyes'
						)
					),
					(int) $wp_query->found_posts,
					'<span class="page-description search-term">' . esc_html( get_search_query() ) . '</span>'
				);
				?>
            </h1>
        </header><!-- .page-header -->

        <div class="entry-content">
			<?php if ( ! have_posts() ): ?>
                <p><?php esc_html_e( 'Wanna try another search? 🍀', 'soyes' ); ?></p>
			<?php endif; ?>

			<?php get_search_form(); ?>

			<?php if ( ! have_posts() ): ?>
                <div>
                    <p>
						<?php esc_html_e( 'Still not having it?', 'soyes' ); ?>
                    </p>
                    <a href="<?php echo get_home_url( '/' ) ?>"
                       title="<?php esc_html_e( 'Return to home', 'soyes' ) ?>"
                       class="wp-block-button__link">
						<?php esc_html_e( 'return "/";', 'soyes' ) ?>
                    </a>
                    <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"
                       title="<?php esc_html_e( 'Find all posts', 'soyes' ) ?>"
                       class="wp-block-button__link">
						<?php esc_html_e( 'find_all_articles();', 'soyes' ) ?>
                    </a>
                </div>
			<?php endif; ?>
        </div><!-- .entry-content -->

        <div class="entry-content">
			<?php
			if ( have_posts() ):
				while ( have_posts() ):
					the_post();
					get_template_part( 'template-parts/elements/card' );
				endwhile;
			endif;
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

get_footer();