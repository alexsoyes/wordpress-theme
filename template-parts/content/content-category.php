<?php

/**
 * Category page listing posts.
 */

?>

<article data-clarity-region="category">
    <header class="entry-header">
        <div class="entry-content">
            <?php
            // show yoast seo breadcrumb
            if (function_exists('yoast_breadcrumb')) {
                yoast_breadcrumb('<p class="has-text-align-center">', '</p>');
            }
            ?>
            <div class="entry-text">
                <?php echo wp_kses_post(wpautop(get_the_archive_description())); ?>
            </div><!-- .entry-text -->
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="cards">
            <?php
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/elements/card');
            }
            ?>
        </div><!-- .cards -->
    </div><!-- .entry-content -->

    <footer class="entry-footer default-max-width">
        <div class="entry-content">
            <?php
            $category_id = get_queried_object()->term_id;
            $term_meta = get_option("taxonomy_term_$category_id");

            echo wp_kses_post(wpautop($term_meta['extra_category_description']));
            ?>
        </div>
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
    </footer><!-- .entry-footer -->
</article>
