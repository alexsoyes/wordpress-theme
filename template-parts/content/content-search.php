<?php

/**
 *  Search results.
 */


if ( have_posts() ):
	?>
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
        </div>

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
<?php else: ?>
    <h2><?php esc_html_e( 'No content found.', 'soyes' ); ?></h2>
<?php endif;

get_footer();
