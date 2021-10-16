<?php

/**
 * Display "blog" page with categories.
 */

get_header();

if ( have_posts() ) :?>

    <article id="page_for_posts">
        <header class="entry-header">
            <div class="entry-content">
                <h1><?php single_post_title(); ?></h1>
				<?php if ( ! is_paged() ) : ?>
                    <div class="entry-text">
						<?php echo apply_filters( 'the_content', get_post( get_option( 'page_for_posts' ) )->post_content ); ?>
                    </div><!-- .entry-text -->
				<?php endif; ?>
            </div><!-- .entry-content -->
        </header><!-- .entry-header -->

        <div class="entry-content">
			<?php get_search_form(); ?>
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

<?php
endif;

get_footer();
