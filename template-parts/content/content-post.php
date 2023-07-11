<?php

/**
 * Template part for displaying posts (aka single posts).
 */

?>
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?> data-clarity-region="article">

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

        <div class="entry-content entry-post">
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
            <?php the_content(); ?>
            <?php
            $category = soyes_get_the_main_category();
            $posts = get_posts([
                'category' => $category->cat_ID,
                'post__not_in' => [get_the_ID()],
                'posts_per_page' => 100,
                'orderby' => 'title',
                'order' => 'ASC',
            ]);

            printf('<h2 id="contenu-similaire">%s</h2>', esc_html__('More content:', 'soyes'));
            printf('<p>%s</p>', esc_html__('If you want to read more on the subject.', 'soyes'));
            echo '<ul>';
            foreach ($posts as $index => $post) {
                printf('<li><a href="%s">%s</a></li>', get_permalink($post->ID), $post->post_title);
            }
            echo '</ul>';
            ?>
            <?php
            global $post;
            if (has_shortcode($post->post_content, 'soyes_toc')): ?>
        </div><!-- .wp-block-column -->
        <div class="wp-block-column" style="flex-basis: 33.33%; position: relative">
            <?php get_template_part('template-parts/elements/toc'); ?>
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
                <div class="sticky-buttons">
                    <a href="#page" title="<?php esc_html_e('Back to top', 'soyes'); ?>">
                        <span class="back-to-top">☝️</span><!-- .back-to-top -->
                    </a><!-- #page -->
                    <?php get_template_part('template-parts/elements/toc-menu'); ?>
                </div><!-- .sticky-buttons -->
            </div><!-- #community -->
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->

<?php

if (comments_open() || get_comments_number()) {
    comments_template();
}
