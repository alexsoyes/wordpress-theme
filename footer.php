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
        <p class="popup-title"><?php _e('Guide gratuit des supers devs 👇', 'soyes'); ?></p>
        <div class="entry-content">
            <ul class="simple">
                <li>🧑‍💻 3 roadmaps pour devenir un super dev</li>
                <li>🚀 Les astuces pour doubler sa productivité</li>
                <li>🔮 Pourquoi les IAs vont changer le code</li>
                <li>✅ Les meilleures ressources de dev</li>
            </ul>
        </div><!-- .entry-content -->
        <form class="soyes-newsletter-form"
              action="<?php echo get_template_directory_uri(); ?>/custom/newsletter-relay.php"
              method="post">
            <!-- Lead magnet -->
            <input type="hidden" name="timezone" value="">
            <input type="hidden" name="is_desktop" value="">
            <input type="hidden" name="entity_id" value="4354526b-8920-4f87-bcbe-bb5e459cc262">
            <input type="hidden" name="remote_url_id" value="7544150775c5a7686eb38d3b08f48e08e000ad4">
            <input type="hidden" name="remote_source" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
            <input name="email" type="email" placeholder="<?php _e('Adresse e-mail', 'soyes'); ?>"
                   required
                   aria-label="Adresse e-mail" class="soyes-newsletter-email">
            <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                   value="Recevoir le lien">
        </form><!-- .soyes-newsletter-form -->
        <span class="close">x</span>
        <p class="popup-end">
            <small>
                💌 + 1 conseil dev / semaine via
                <a href="https://alexsoyes.com" target="_blank">
                    <?php _e('ma newsletter "La console".', 'soyes'); ?>
                </a>
            </small>
        </p>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

</body>
</html>
