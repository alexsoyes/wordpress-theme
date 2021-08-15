<?php

/**
 * Blog main page
 */

?>

<article id="page_for_posts">
    <header class="entry-header">
        <div class="entry-content">
            <h1><?php single_post_title(); ?></h1>
			<?php if ( ! is_paged() ) : ?>
                <div>
					<?php echo apply_filters( 'the_content', get_post( get_option( 'page_for_posts' ) )->post_content ); ?>
                </div>
			<?php endif; ?>
			<?php get_template_part( 'template-parts/elements/categories' ); ?>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
		<?php
		while ( have_posts() ) {
			the_post();

			get_template_part( 'template-parts/elements/card' );
		}
		?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
		<?php soyes_the_posts_navigation(); ?>
    </footer><!-- .entry-footer -->
</article><!-- #page_for_posts -->
