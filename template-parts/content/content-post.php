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
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p id="breadcrumbs">', '</p>');
            }
            ?>
            <?php the_content(); ?>
            <?php
            global $post;
            if (has_shortcode($post->post_content, 'soyes_toc')): ?>
        </div><!-- .wp-block-column -->
        <div class="wp-block-column" style="flex-basis: 33.33%; position: relative">
            <div class="toc-bot-container" id="toc-bot-container">
                <div class="banner-cta">
                    <?php get_template_part('template-parts/elements/banner-cta'); ?>
                </div><!-- .banner-cta -->
                <div id="column-toc" class="toc-bot"></div>
            </div><!-- .toc-bot-container -->
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
                <div class="toc-bot-button-container">
                    <input type="checkbox" id="toc-button" class="toc-input">
                    <label class="toc-icon" for="toc-button">
                        <span id="toc-nav-menu">
                            <span></span>
                            <span></span>
                            <span></span>
                        </span>
                    </label>
                </div><!-- .toc-button -->
            </div><!-- #community -->
        </footer><!-- .entry-footer -->
    </article><!-- #post-<?php the_ID(); ?> -->

<?php

printf('<div class="entry-newsletter">%s</div>', do_shortcode('[soyes_newsletter]'));

$category = soyes_get_the_main_category();
$posts = get_posts([
    'category' => $category->cat_ID,
    'post__not_in' => [get_the_ID()],
]);

echo '<div class="entry-content entry-related" style="background-color: var(--color-primary)">';
printf('<h2 class="entry-title">%s %s</h2>', esc_html__('Va encore plus loin dans : ', 'soyes'), $category->name);
echo '<div class="wp-block-columns">';

foreach ($posts as $index => $post) {
    if (0 !== $index && 0 === ($index % 3)) {
        echo '</div><!-- .wp-block-columns --><div class="wp-block-columns">';
    }

    setup_postdata($post);
    echo '<div class="wp-block-column">';
    get_template_part('template-parts/elements/card');
    echo '</div><!-- .wp-block-column -->';
}

echo '</div><!-- .wp-block-columns -->';
echo '</div><!-- .entry-content -->';

wp_reset_postdata();

if (comments_open() || get_comments_number()) {
    comments_template();
}
