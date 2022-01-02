<?php

/**
 * Blog main page.
 */

?>

<article>
    <header class="entry-header">
        <div class="entry-content">
            <p class="entry-return-link">
                <small>
                    <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"
                       title="<?php esc_html_e( 'Find all posts', 'soyes' ) ?>">
						<?php esc_html_e( '< Return to blog posts', 'soyes' ) ?>
                    </a>
                </small>
            </p><!-- .entry-return-link -->
            <h1><?php single_cat_title(); ?></h1>
            <div class="entry-text">
				<?php echo wp_kses_post( wpautop( get_the_archive_description() ) ); ?>
            </div><!-- .entry-text -->
	        <?php get_template_part( 'template-parts/elements/categories' ); ?>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php get_search_form(); ?>
        <div class="cards">
            <?php
            while ( have_posts() ) {
                the_post();
                get_template_part( 'template-parts/elements/card' );
            }
            ?>
        </div><!-- .cards -->
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
		<?php
		wp_link_pages(
			array(
				'before'           => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'soyes' ) . '">',
				'after'            => '</nav>',
				/* translators: %: Page number. */
				'pagelink'         => esc_html__( 'Page %', 'soyes' ),
			)
		);
		?>
    </footer><!-- .entry-footer -->
</article>
