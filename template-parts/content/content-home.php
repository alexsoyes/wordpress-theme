<?php
/**
 * Blog main page
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <div class="entry-content">
            <h1><?php single_post_title(); ?></h1>
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
</article><!-- #post-<?php the_ID(); ?> -->
