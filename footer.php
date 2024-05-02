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
$url = "https://learn.alexsoyes.com/ressources-ia?utm_source=blog&utm_medium=popin&utm_campaign=5-ressources-ia&utm_terms=ia";
?>

<aside class="exit-intent-popup" style="display: none;">
    <div class="popup">
        <div class="popup-content">
            <div class="popup-more-content">

                <img src="https://alexsoyes.com/wp-content/uploads/2024/05/5-resources-ia.png"
                     alt="Ressources IA gratuites pour les développeurs">

                <div class="popup-header">
                    <p class="popup-title"><?php _e('J\'ai passé 9 mois à coder avec l\'ia...', 'soyes'); ?></p>
                </div>
                <p class="has-text-align-center">
                    Pour créer <em>+30 prompts testés, 2 GPTs personnalisés, Accès Discord, une liste de +50 outils d'IA
                        pour
                        devs...</em>
                </p>

                <small>Je te partage tout ça dans un mail unique :</small>

                <div class="has-text-align-center">
                    <form class="soyes-newsletter-form inline"
                          action="<?php echo soyes_form_action('free-resources-ai'); ?>"
                          method="post">
                        <input type="hidden" name="type" value="free-resources-ai">
                        <input type="hidden" name="remote_source" value="<?php soyes_the_current_uri(); ?>">
                        <input type="hidden" name="timezone">
                        <input type="hidden" name="is_desktop">
                        <input name="email" type="email" placeholder="<?php _e('Mon adresse e-mail', 'soyes'); ?>"
                               required
                               aria-label="Adresse e-mail" class="soyes-newsletter-email">
                        <input type="submit" class="wp-block-button__link actionable soyes-newsletter-submit"
                               value="Recevoir maintenant">
                    </form><!-- .soyes-newsletter-form -->
                </div>
            </div><!-- .popup-more-content -->
        </div><!-- .entry-content -->
        <span class="close">X</span>
    </div><!-- .popup -->
</aside><!-- .exit-intent-popup -->

<script>
    const urlParams = new URLSearchParams(window.location.search);

    if (urlParams.get('message')) {
        alert("Ton e-mail est détecté comme SPAM, hello@alexsoyes.com pour plus d'infos.");
    }

    /**
     * Loaded by URL script.
     */
    function initRecaptcha() {
        const forms = document.querySelectorAll('form.soyes-newsletter-form');

        grecaptcha.ready(function () {
            grecaptcha.execute('6LdgxOgkAAAAACxwa9O5V32POHoZ9yoUJtCTrjGX', {action: 'submit'}).then(function (token) {
                const hiddenField = document.createElement('input');

                hiddenField.setAttribute('type', 'hidden');
                hiddenField.setAttribute('name', 'g-recaptcha-response');
                hiddenField.setAttribute('value', token);

                console.log(forms);
                for (let i = 0; i < forms.length; i++) {
                    const form = forms[i];

                    const isDesktop = form.querySelector('input[name="is_desktop"]');
                    const timezone = form.querySelector('input[name="timezone"]');

                    isDesktop.value = !window.matchMedia('(max-width: 781px)').matches;
                    timezone.value = Intl.DateTimeFormat().resolvedOptions().timeZone;

                    form.appendChild(hiddenField);
                }
            });
        });
    }
</script>

</body>
</html>
