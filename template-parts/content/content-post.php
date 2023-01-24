<?php

/**
 * Template part for displaying posts (aka single posts).
 */

?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
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
            <div class="wp-block-columns is-column-reversed-on-mobile">
                <div class="wp-block-column" id="column-content">
                    <?php the_content(); ?>
                </div><!-- .wp-block-column -->
                <div class="wp-block-column is-relative">
                    <input type="checkbox" id="toc" class="toc-input">
                    <label class="toc-icon" for="toc">☰</label>
                    <div id="column-toc" class="toc toc-right"></div>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->
            <?php
            wp_link_pages(
                array(
                    'before' => '<nav class="page-links" aria-label="' . esc_attr__('Page', 'soyes') . '">',
                    'after' => '</nav>',
                    /* translators: %: Page number. */
                    'pagelink' => esc_html__('Page %', 'soyes'),
                )
            );
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">
            <div id="community" class="entry-social">
                <?php get_template_part('template-parts/elements/share'); ?>
                <a href="#page" title="<?php esc_html_e('Back to top', 'soyes'); ?>">
                    <span class="back-to-top">☝️</span><!-- .back-to-top -->
                </a>

            </div>
        </footer><!-- .entry-footer -->

    </article><!-- #post-<?php the_ID(); ?> -->

<?php

if (comments_open() || get_comments_number()) {
    comments_template();
}
