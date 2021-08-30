<?php

/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
			<?php get_template_part( 'template-parts/post/post-header' ); ?>
        </header><!-- .entry-header -->

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

        <footer class="entry-footer entry-social">
			<?php get_template_part( 'template-parts/elements/share' ); ?>
        </footer><!-- .entry-footer -->

    </article><!-- #post-<?php the_ID(); ?> -->

<?php

if ( comments_open() || get_comments_number() ) {
	comments_template();
}
