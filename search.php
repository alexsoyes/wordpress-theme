<?php
/**
 * The template for displaying search results pages.
 */

get_header();
?>

    <article>
        <header class="entry-content entry-header alignwide">
            <h1>
                <?php
                $numberOfPosts = (int)$wp_query->found_posts;
                printf(
                    esc_html(
                    /* translators: %d: The number of search results. */
                        _n(
                            'We found %1$s result for your search "%2$s".',
                            'We found %1$s results for your search "%2$s".',
                            $numberOfPosts,
                            'soyes'
                        )
                    ),
                    '<span class="search-term">' . $numberOfPosts . '</span>',
                    '<span class="search-term">' . esc_html(get_search_query()) . '</span>'
                );
                ?>
            </h1>
        </header><!-- .entry-header -->


        <div class="entry-content">
            <?php get_search_form(); ?>

            <?php if (!have_posts()) : ?>
                <h2><?php esc_html_e('Wanna try another search? 🍀', 'soyes'); ?></h2>
                <div>
                    <?php get_template_part('template-parts/elements/return-categories'); ?>
                </div>
            <?php else: ?>
                <div class="cards">
                    <?php
                    while (have_posts()) :
                        the_post();
                        get_template_part('template-parts/elements/card');
                    endwhile;
                    ?>
                </div><!-- .cards -->
            <?php endif; ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer default-max-width">
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

<?php

get_footer();
