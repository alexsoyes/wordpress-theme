<?php

/**
 * Template part for displaying CPT "conseil".
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">

            <p class="entry-return-link">
                <small>
                    <a href="<?php echo get_post_type_archive_link('conseil'); ?>"
                       title="<?php esc_html_e('Tous les conseils', 'soyes') ?>">
                        <?php esc_html_e('👈 La liste de tous les conseils', 'soyes') ?>
                    </a>
                </small>
            </p><!-- .entry-return-link -->

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
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
            <?php the_content(); ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div class="entry-content">
                <?php get_template_part('template-parts/elements/banner-cta'); ?>
            </div><!-- .entry-content -->
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->

<?php

comments_template();
