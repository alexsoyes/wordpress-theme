<?php

/**
 * Template part for displaying CPT "conseil".
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-clarity-region="conseil">

    <header class="entry-header">
        <div class="entry-content">
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
        </div>
        <p><?php printf(__('<a href="%s">Cette newsletter</a> est envoyée chaque lundi matin à 10h 📧', 'soyes'), 'https://alexsoyes.com/newsletter/'); ?></p>
        <?php get_template_part('template-parts/post/post-header'); ?>
    </header><!-- .entry-header -->

    <div class="entry-share">
        <div class="link-share">
            <div class="link-share-buttons">
                <?php get_template_part('template-parts/elements/share-icons'); ?>
            </div><!-- .link-share-buttons -->
        </div><!-- .link-share -->
    </div><!-- .entry-share -->

    <div class="entry-content">
        <p><?php _e('Salut, c\'est Alex 👋', 'soyes'); ?></p>
        <?php the_content(); ?>
        <p><?php _e('À la semaine prochaine pour nouvelle newsletter,', 'soyes'); ?></p>
        <p><?php _e('Alex', 'soyes'); ?></p>
    </div><!-- .entry-content -->

    <footer class="entry-footer has-text-align-center">
        <div class="entry-content">
            <p class="entry-return-link">
                <small>
                    <a class="wp-block-button__link"
                       href="<?php echo get_post_type_archive_link('conseil'); ?>"
                       title="<?php esc_html_e('Tous les conseils', 'soyes') ?>">
                        <?php esc_html_e('👈 La liste de tous les conseils', 'soyes') ?>
                    </a>
                </small>
            </p><!-- .entry-return-link -->
        </div><!-- .entry-content -->
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
