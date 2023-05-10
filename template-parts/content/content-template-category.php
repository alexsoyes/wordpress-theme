<?php

/**
 * Display page content as category, used for "formation" page.
 */

?>

<article>
    <header class="entry-header">
        <div class="entry-content">
            <?php get_template_part('template-parts/elements/return-home'); ?>
            <h1><?php the_title(); ?></h1>
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="cards">
            <?php the_content(); ?>

            <h2>Mini-cours gratuits ✅</h2>

            <p>
                Une séquence 5 emails par jour pendant 1 semaine pour maîtriser un sujet (100% gratuit).
            </p>

            <?php get_template_part('template-parts/cta/free-lesson-ai'); ?>
            <?php get_template_part('template-parts/cta/free-lesson-freelance'); ?>

            <h2>Formations payantes 💰</h2>

            <p>
                Mes formations payantes (et très qualitatives) pour aller beaucoup plus loin avec des exemples de
                comment passer à l'action.
            </p>

            <?php get_template_part('template-parts/cta/course-copilot'); ?>
            <?php get_template_part('template-parts/cta/course-freelance'); ?>

        </div><!-- .cards -->
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
