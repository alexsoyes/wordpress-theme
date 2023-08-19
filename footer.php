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
        <?php dynamic_sidebar('sidebar-footer-about'); ?>
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
        <?php echo esc_html__("Blog d'un développeur web freelance et digital nomad.", 'soyes'); ?>
    </div><!-- .powered-by -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>


<aside class="exit-intent-popup" style="display: none;">
    <div class="popup">
        <div class="wp-block-columns">
            <div class="wp-block-column">
                <div class="popup-content">
                    <div class="popup-header">
                        <p class="popup-title"><?php _e('🎁 2 cours gratuits pour les devs', 'soyes'); ?></p>
                    </div>
                    <div class="popup-more-content has-text-align-center">
                        <p>
                            <?php _e('Dans "La console", je partage 1 astuce de code par semaine.', 'soyes'); ?>
                        </p>
                        <p>
                            <em>
                                Choisir ton cours gratuit 👇
                            </em>
                        </p>
                    </div><!-- .popup-more-content -->
                    <div class="wp-block-columns">
                        <div class="wp-block-column has-text-align-center">
                            <p class="has-text-align-center has-large-font-size">🚀</p>
                            <p class="has-medium-font-size">
                                <strong>
                                    <?php _e("Devenir développeur freelance (sans risque)", 'soyes'); ?>
                                </strong>
                            </p>
                        </div>
                        <div class="wp-block-column has-text-align-center">
                            <p class="has-text-align-center has-large-font-size">🤖</p>
                            <p class="has-medium-font-size">
                                <strong>
                                    <?php _e("Coder 30% plus rapidement avec l'IA️", 'soyes'); ?>
                                </strong>
                            </p>
                        </div>
                    </div>
                    <form class="soyes-newsletter-form"
                          action="<?php echo soyes_form_action('newsletter-lead-magnet'); ?>"
                          method="post">
                        <input type="hidden" name="type" value="newsletter-lead-magnet">
                        <input type="hidden" name="remote_source" value="<?php soyes_the_current_uri(); ?>">
                        <input type="hidden" name="timezone">
                        <input type="hidden" name="is_desktop">
                        <input name="email" type="email" placeholder="<?php _e('Mon adresse e-mail', 'soyes'); ?>"
                               required
                               aria-label="Adresse e-mail" class="soyes-newsletter-email">
                        <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                               value="M'inscrire maintenant">
                    </form><!-- .soyes-newsletter-form -->
                    <div class="popup-end">
                        <small>
                            <?php _e('RGPD friendly 🌱 - Désinscription à tout moment', 'soyes'); ?>
                        </small>
                    </div><!-- .popup-end -->
                </div><!-- .entry-content -->
            </div>
        </div><!-- .wp-block-columns -->
        <span class="close">x</span>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

</body>
</html>
