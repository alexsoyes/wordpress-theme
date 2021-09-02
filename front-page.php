<?php

/**
 * Content for front page aka /.
 */

get_header();

if ( have_posts() ) : ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <div class="entry-content">
			<?php the_content(); ?>
        </div><!-- .entry-content -->

    </article><!-- #post-<?php the_ID(); ?> -->

<?php
endif;

get_footer();
