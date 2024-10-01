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

<?php
$url = "https://learn.alexsoyes.com/guide-ia?utm_source=blog&utm_medium=popin&utm_campaign=guide-ia&utm_terms=ia";
?>

<aside class="exit-intent-popup" style="display: none;">
    <div class="popup">
        <div class="popup-content">
            <div class="popup-more-content">

                <img src="https://alexsoyes.com/wp-content/uploads/2024/10/2.png"
                     alt="Ressources IA gratuites pour les développeurs">

                <div class="popup-header">
                    <p class="popup-title"><?php _e('Guide IA gratuit', 'soyes'); ?></p>
                </div>

                <p class="has-text-align-center">Tu trouveras mes meilleurs <em>prompts</em>, ma <em>stack IA</em>
                    personnel et notre <em>communauté
                        privée</em> sur Disord. </p>

                <div class="has-text-align-center">
                    <form class="soyes-newsletter-form inline"
                          action="<?php echo soyes_form_action('free-guide-ai'); ?>"
                          method="post">

                        <input name="type" type="hidden" value="free-guide-ai">
                        <input name="remote_source" type="hidden" value="<?php soyes_the_current_uri(); ?>">
                        <input name="timezone" type="hidden">
                        <input name="is_desktop" type="hidden">

                        <input aria-label="Adresse e-mail" class="soyes-newsletter-email" name="email"
                               placeholder="<?php _e('Mon adresse e-mail', 'soyes'); ?>"
                               required type="email">
                        <input class="wp-block-button__link actionable soyes-newsletter-submit"
                               type="submit"
                               value="Recevoir maintenant">

                        <div class="g-recaptcha"
                             data-sitekey="6LeeH-UpAAAAABXpv9PnfIt9HfFsb4IttXZ24xGU"></div>
                        <input name="g-recaptcha-response-v2" type="hidden">

                        <!-- Div pour le message d'erreur -->
                        <div class="recaptcha-error" style="color: red; display: none;">Veuillez compléter le
                            reCAPTCHA.
                        </div>
                    </form><!-- .soyes-newsletter-form -->
                </div>
            </div><!-- .popup-more-content -->
        </div><!-- .entry-content -->
        <span class="close">X</span>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

<script>
    function initReCaptcha() {
        document.querySelectorAll('.g-recaptcha').forEach(function (el) {
            const widgetId = grecaptcha.render(el, {
                'sitekey': el.getAttribute('data-sitekey'),
                'callback': function (response) {
                    el.closest('form').querySelector('input[name="g-recaptcha-response-v2"]').value = response;
                }
            });
            el.setAttribute('data-widget-id', widgetId);
        });
    }

    function init() {
        const forms = document.querySelectorAll('form.soyes-newsletter-form');

        forms.forEach(form => {
            form.addEventListener('submit', function (event) {
                const recaptchaResponse = form.querySelector('input[name="g-recaptcha-response-v2"]').value;
                const recaptchaError = form.querySelector('.recaptcha-error');

                if (!recaptchaResponse) {
                    event.preventDefault();
                    recaptchaError.style.display = 'block';
                } else {
                    recaptchaError.style.display = 'none';

                    // disable submit button and input
                    form.querySelector('input[type="submit"]').disabled = true;
                    form.querySelector('input[name="email"]').readonly = true;
                }
            });

            const isDesktop = form.querySelector('input[name="is_desktop"]');
            const timezone = form.querySelector('input[name="timezone"]');

            isDesktop.value = !window.matchMedia('(max-width: 781px)').matches;
            timezone.value = Intl.DateTimeFormat().resolvedOptions().timeZone;
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        init();
        initReCaptcha();
    });
</script>

</body>
</html>
