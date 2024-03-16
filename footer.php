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
                        'walker' => new SoYes_Walker_Nav_Menu_JS_Links(),
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
        <div class="popup-content">
            <div class="popup-header">
                <p class="popup-title"><?php _e('🎁 Masterclass gratuite "Coder avec l\'IA"', 'soyes'); ?></p>
            </div>
            <div class="popup-more-content has-text-align-center">
                <p>
                    <?php _e('<strong>+ 1h de vidéo</strong> sur comment utiliser au mieux l\'IA,<br><em>en tant que développeur</em>.', 'soyes'); ?>
                </p>

                <img src="https://alexsoyes.com/wp-content/uploads/2023/12/capture-ecran-webinar-coder-avec-ia.png"
                     alt="Replay de la conférence gratuite pour coder avec l'IA">

                <a href="https://learn.alexsoyes.com/conference-coder-avec-ia-replay?utm_source=blog&utm_campaign=card"
                   target="_blank"
                   class="wp-block-button__link soyes-newsletter-submit wp-block-column">
                    Recevoir gratuitement la masterclass️
                </a>
            </div><!-- .popup-more-content -->
        </div><!-- .entry-content -->
        <span class="close">x</span>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

<script>
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('message')) {
        alert("ReCaptcha a planté :'(, désolé pour ça. Contacte-moi sur hello@alexsoyes.com et je t'ajouterai ! 🙏");
    }

    const forms = document.querySelectorAll('.soyes-newsletter-form');

    /**
     * Loaded by URL script.
     */
    function initRecaptcha() {
        grecaptcha.ready(function () {
            grecaptcha.execute('6LdgxOgkAAAAACxwa9O5V32POHoZ9yoUJtCTrjGX', {action: 'submit'}).then(function (token) {

                for (let i = 0; i < forms.length; i++) {
                    const form = forms[i];

                    const isDesktop = form.querySelector('input[name="is_desktop"]');
                    const timezone = form.querySelector('input[name="timezone"]');

                    isDesktop.value = !window.matchMedia('(max-width: 781px)').matches;
                    timezone.value = Intl.DateTimeFormat().resolvedOptions().timeZone;

                    const hiddenField = document.createElement('input');
                    hiddenField.setAttribute('type', 'hidden');
                    hiddenField.setAttribute('name', 'g-recaptcha-response');
                    hiddenField.setAttribute('value', token);
                    form.appendChild(hiddenField);
                }
            });
        });
    }
</script>

</body>
</html>
