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
            <?php the_content(); ?>
            <?php
            global $post;
            if (has_shortcode($post->post_content, 'soyes_toc')): ?>
            </div><!-- .wp-block-column -->
                <div class="wp-block-column" style="flex-basis: 33.33%; position: relative">
                    <input type="checkbox" id="toc" class="toc-input">
                    <label class="toc-icon" for="toc">☰</label>
                    <div id="column-toc" class="toc-bot"></div>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->
            <?php endif; ?>
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
                </a><!-- #page -->
            </div><!-- #community -->
        </footer><!-- .entry-footer -->

    </article><!-- #post-<?php the_ID(); ?> -->

<?php

if (comments_open() || get_comments_number()) {
    comments_template();
}
