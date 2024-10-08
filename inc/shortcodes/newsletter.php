<?php

/**
 * Simple newsletter block
 *
 * @todo move outside the theme
 */

add_shortcode(
    'soyes_newsletter',
    'soyes_newsletter'
);

add_shortcode(
    'soyes_newsletter_form',
    'soyes_newsletter_form'
);

function has_newsletter_type_callback($atts): bool
{
    return
        is_array($atts) &&
        array_key_exists('type', $atts) &&
        in_array($atts['type'], [
            'newsletter_homepage',
            'newsletter_in_content',
            'newsletter_lead_magnet',
            'newsletter_footer',
            'newsletter_conseil',
            'newsletter_page',
        ]);
}

function soyes_newsletter_form($atts = []): string
{
    if (!has_newsletter_type_callback($atts)) {
        return '';
    }

    $type = $atts['type'];

    ob_start();
    ?>
    <div class="soyes-newsletter-content">
        <div class="soyes-newsletter-fill">
            <form id="<?php echo $type; ?>"
                  class="soyes-newsletter-form"
                  action="<?php echo soyes_form_action($type); ?>"
                  method="post">
                <div class="wp-block-columns">
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="remote_source" value="<?php soyes_the_current_uri(); ?>">
                    <input type="hidden" name="timezone">
                    <input type="hidden" name="is_desktop">
                    <input name="email" type="email" placeholder="<?php _e('Ton meilleur e-mail', 'soyes'); ?>"
                           required
                           aria-label="Adresse e-mail" class="soyes-newsletter-email wp-block-column">
                    <input type="submit"
                           class="wp-block-button__link soyes-newsletter-submit wp-block-column"
                           value="<?php _e("Rejoins +3000 devs 🔥", 'soyes'); ?>">
                </div>


                <div class="g-recaptcha"
                     data-sitekey="6LeeH-UpAAAAABXpv9PnfIt9HfFsb4IttXZ24xGU"></div>
                <input name="g-recaptcha-response-v2" type="hidden">

                <!-- Div pour le message d'erreur -->
                <div class="recaptcha-error" style="color: red; display: none;">Veuillez compléter le
                    reCAPTCHA.
                </div>

            </form><!-- .soyes-newsletter-form -->
            <small class="soyes-newsletter-warn">
                <?php _e('100% gratuit et respecte ta vie privée 🌱', 'soyes'); ?>
            </small><!-- .soyes-newsletter-warn -->
        </div><!-- .soyes-newsletter-fill -->
    </div><!-- .soyes-newsletter-content -->
    <?php
    return ob_get_clean();
}

/**
 * @param array $atts
 *
 * @return string
 */
function soyes_newsletter($atts = []): string
{
    if (!has_newsletter_type_callback($atts)) {
        return '';
    }

    $type = $atts['type'];
    $container_class = 'soyes-newsletter-container';
    $additional_class = array_key_exists('class', $atts) ? $atts['class'] : false;

    if ($additional_class) {
        $container_class = "$container_class $additional_class";
    }
    ob_start();
    ?>
    <div class="<?php echo esc_html($container_class); ?>">
        <div>
            <img src="<?php echo soyes_get_the_image('logo-only-white', 'svg', false, false); ?>"
                 alt="<?php echo get_bloginfo('name'); ?>"
                 width="50" height="50">
            <p class="soyes-newsletter-title">
                <?php
                _e(
                    'Gagne 1h/jour <span>avec L\'IA</span>',
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->
            <p class="soyes-newsletter-desc">
                <?php _e("Chaque semaine, <strong>je te donne les astuces qui m'ont fait coder 30% plus rapidement</strong> avec L'IA.", 'alexsoyes'); ?>
            </p><!-- . soyes-newsletter-desc -->
        </div>
        <?php echo do_shortcode('[soyes_newsletter_form type="' . $type . '"]'); ?>
    </div><!-- .soyes-newsletter-container -->
    <?php
    return ob_get_clean();
}
