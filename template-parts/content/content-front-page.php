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

    <div class="entry-content">
		<?php the_content(); ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
    </footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
