<?php

/**
 * Template part for displaying posts (aka single posts).
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
			<?php get_template_part( 'template-parts/post/post-header' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-share">
            <div class="link-share">
                <div class="link-share-buttons">
                    <?php get_template_part( 'template-parts/elements/share-icons' ); ?>
                </div><!-- .link-share-buttons -->
            </div><!-- .link-share -->
        </div><!-- .entry-share -->

        <div class="entry-content">
			<?php
			the_content();

			wp_link_pages(
				array(
					'before'   => '<nav class="page-links" aria-label="' . esc_attr__( 'Page', 'soyes' ) . '">',
					'after'    => '</nav>',
					/* translators: %: Page number. */
					'pagelink' => esc_html__( 'Page %', 'soyes' ),
				)
			);
			?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div id="community" class="entry-social">
			    <?php get_template_part( 'template-parts/elements/share' ); ?>
                <a href="#page" title="<?php esc_html_e( 'Back to top', 'soyes' ); ?>">
                    <img src="<?php echo soyes_get_the_image( 'caret-up-outline', 'svg', true, false ) ?>"
                         alt="<?php esc_html_e( 'Back to top', 'soyes' ); ?>" width="30" height="30"
                         aria-hidden="true" class="back-to-top"/>
                </a>
            </div>
        </footer><!-- .entry-footer -->

    </article><!-- #post-<?php the_ID(); ?> -->

<?php

if ( comments_open() || get_comments_number() ) {
	comments_template();
}
