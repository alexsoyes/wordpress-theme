<?php

/**
 * Blog main page.
 */

?>

<article>
    <header class="entry-header">
        <div class="entry-content">
            <div class="entry-return-link">
                <small>
                    <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"
                       title="<?php esc_html_e( 'Find all posts', 'soyes' ); ?>"
                       class="wp-block-button__link">
						<?php esc_html_e( '< Return to blog posts', 'soyes' ); ?>
                    </a>
                </small>
            </div>
            <h1><?php single_cat_title(); ?></h1>
            <div class="entry-text">
				<?php echo wp_kses_post( wpautop( get_the_archive_description() ) ); ?>
            </div>
			<?php get_template_part( 'template-parts/elements/categories' ); ?>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php
		get_search_form();

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
