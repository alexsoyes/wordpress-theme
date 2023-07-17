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
                        <p class="popup-title"><?php _e('Comment devenir meilleur en code ?', 'soyes'); ?></p>
                    </div>
                    <div class="popup-more-content">
                        <p>
                            <strong>
                                <?php _e('📩 1 astuce de code / semaine via ma newsletter "La console".', 'soyes'); ?>
                            </strong>
                        </p>
                        <p>
                            <em>
                                <?php _e('🎁 Bonus, 2 cours offerts.', 'soyes'); ?>
                            </em>
                        </p>
                    </div><!-- .popup-more-content -->
                    <ol>
                        <li>
                            <?php _e("Devenir développeur freelance (sans risque) 🚀", 'soyes'); ?>
                        </li>
                        <li>
                            <?php _e("Coder 30% plus rapidement avec l'IA ⚡️", 'soyes'); ?>
                        </li>
                    </ol>
                    <form class="soyes-newsletter-form"
                          action="<?php echo soyes_form_action('newsletter-lead-magnet'); ?>"
                          method="post">
                        <input type="hidden" name="type" value="newsletter-lead-magnet">
                        <input type="hidden" name="timezone">
                        <input type="hidden" name="is_desktop">
                        <input name="email" type="email" placeholder="<?php _e('Ton meilleur e-mail', 'soyes'); ?>"
                               required
                               aria-label="Adresse e-mail" class="soyes-newsletter-email">
                        <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                               value="M'inscrire maintenant">
                    </form><!-- .soyes-newsletter-form -->
                    <p class="popup-end">
                        <small>
                            <?php _e('RGPD friendly 🌱 - Désinscription à tout moment', 'soyes'); ?>
                        </small>
                    </p><!-- .popup-end -->
                </div><!-- .entry-content -->
            </div>
        </div><!-- .wp-block-columns -->
        <span class="close">x</span>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

</body>
</html>
