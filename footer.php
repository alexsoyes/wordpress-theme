<?php

/**
 * The template for displaying the footer
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>

<footer id="colophon" class="site-footer">

    <?php if (is_active_sidebar('sidebar-footer-about')) : ?>
        <div class="entry-content">
            <?php dynamic_sidebar('sidebar-footer-about'); ?>
        </div><!-- .entry-content -->
    <?php endif; ?>

    <div class="follow-me">
        <p class="follow-me-title"><?php echo __('Keep in touch', 'soyes'); ?></p><!-- .follow-me-title -->
        <ul class="follow-me-list">
            <?php
            wp_nav_menu(
                array(
                    'walker' => new SoYes_Walker_Nav_Menu_Social(),
                    'theme_location' => 'social',
                    'items_wrap' => '%3$s',
                    'container' => false,
                    'fallback_cb' => false,
                    'depth' => 1,
                )
            );
            ?>
        </ul><!-- follow-me-list -->
    </div><!-- .follow-me -->

    <?php if (has_nav_menu('secondary')) : ?>
        <nav aria-label="<?php esc_attr_e('Secondary menu', 'soyes'); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'secondary',
                        'items_wrap' => '%3$s',
                        'container' => false,
                        'depth' => 1,
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'fallback_cb' => false,
                    )
                );
                ?>
            </ul><!-- .footer-navigation-wrapper -->
        </nav><!-- .footer-navigation -->
    <?php endif; ?>

    <div class="powered-by">
        <?php echo esc_html__('Made with love on the top of WordPress ❤️', 'soyes'); ?>
    </div><!-- .powered-by -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


<aside class="exit-intent-popup" style="display: none;">
    <div class="popup">
        <img src="<?php echo soyes_get_the_image('logo-only', 'svg', false, false); ?>"
             alt="<?php echo get_bloginfo('name'); ?>"
             class="soyes-newsletter-icon"
             width="30" height="30">
        <p class="popup-title"><?php _e('Le guide gratuit pour améliorer son code et sa productivité. 🧑‍💻', 'soyes'); ?></p>
        <p class="popup-description"><?php _e('💌 + 1 action à réaliser chaque semaine', 'soyes'); ?></p>
        <form class="soyes-newsletter-form"
              action="https://alexsoyes.us8.list-manage.com/subscribe/post?u=987967b6e21378d1da9bd507b&amp;id=1984a69e0e"
              method="post">
            <input name="EMAIL" type="email" placeholder="Mon adresse e-mail principale" required=""
                   aria-label="Adresse e-mail" class="soyes-newsletter-email">
            <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                   value="Recevoir le guide 🚀">
        </form>
        <span class="close">x</span>
    </div>
</aside>

</body>
</html>
