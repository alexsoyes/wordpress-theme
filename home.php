<?php

/**
 * Display "blog" page with categories.
 */

get_header();

if (have_posts()) :?>

    <article>
        <header class="entry-header">
            <div class="entry-content">
                <h1><?php single_post_title(); ?></h1>
                <?php if (!is_paged()) : ?>
                    <div class="entry-text">
                        <?php echo apply_filters('the_content', get_post(get_option('page_for_posts'))->post_content); ?>
                    </div><!-- .entry-text -->
                <?php endif; ?>

            </div><!-- .entry-content -->
        </header><!-- .entry-header -->

        <?php get_search_form(); ?>

        <div class="entry-content">
            <?php
            $categories = get_categories(array(
                'orderby' => 'name',
                'order' => 'ASC'
            ));

            foreach ($categories as $category) {
                $args = array(
                    'posts_per_page' => -1,
                    'category' => $category->term_id,
                    'orderby' => 'date',
                    'order' => 'DESC'
                );

                $posts = get_posts($args);
                $posts_count = count($posts);

                if ($posts_count > 0) {
                    printf('<h2 class="card-category-title">%s [%d]</h2>', $category->name, $posts_count);
                    echo '<div class="cards">';
                    foreach ($posts as $post) {
                        setup_postdata($post);
                        get_template_part('template-parts/elements/card');
                    }
                    echo '</div><!-- .cards -->';
                }
            }
            ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer default-max-width">
            <?php soyes_the_posts_navigation(); ?>
        </footer><!-- .entry-footer -->
    </article>

<?php
endif;

get_footer();
