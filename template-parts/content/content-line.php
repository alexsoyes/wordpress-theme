<?php

/**
 * Content line by line.
 */

?>

<article>
    <header class="entry-header">
        <div class="entry-content">
            <h1><?php _e('Les conseils de dev', 'soyes') ?></h1>
            <div class="entry-text">
                <p>
                    <?php _e('Chaque semaine je partage 1 conseil avec 1 action à réaliser pour devenir meilleur(e) dev.', 'soyes') ?>
                </p>
                <p>
                    👉
                    <?php _e('Pour recevoir les conseils dans ta boîte mail, inscris-toi à ', 'soyes'); ?>
                    <a href="<?php echo get_site_url(); ?>" title="<?php _e("S'inscrire sur la console", 'soyes'); ?>">
                        La console
                    </a>.
                </p>
            </div><!-- .entry-text -->
        </div><!-- .entry-content -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <div class="cards">
            <?php
            while (have_posts()) {
                the_post();
                get_template_part('template-parts/elements/card-inline');
            }
            ?>
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
