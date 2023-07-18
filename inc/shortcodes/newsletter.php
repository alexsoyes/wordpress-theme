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

/**
 * @param array $atts
 *
 * @return string
 */
function soyes_newsletter($atts = []): string
{
    $type = is_array($atts) && array_key_exists('campaign', $atts) ? $atts['campaign'] : 'newsletter-homepage';

    $container_class = 'soyes-newsletter-container';

    $additional_class = is_array($atts) && array_key_exists('class', $atts) ? $atts['class'] : false;

    if ($additional_class) {
        $container_class = "$container_class $additional_class";
    }

    ob_start();
    ?>
    <div class="<?php echo esc_html($container_class); ?>">
        <div>
            <img src="<?php echo soyes_get_the_image('logo-only', 'svg', false, false); ?>"
                 alt="<?php echo get_bloginfo('name'); ?>"
                 width="50" height="50">

            <p class="soyes-newsletter-title">
                <?php
                _e(
                    'Newsletter <span>🚀 La console</span>',
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->

            <p class="soyes-newsletter-desc">
                <?php _e("☀️ Chaque lundi matin, je partage <strong>1 nouveau truc de code</strong>.", 'alexsoyes'); ?>
            </p><!-- . soyes-newsletter-desc -->
        </div>

        <div class="soyes-newsletter-content">
            <div class="soyes-newsletter-fill">
                <form class="soyes-newsletter-form wp-block-columns"
                      action="<?php echo soyes_form_action($type); ?>"
                      method="post">
                    <input type="hidden" name="type" value="<?php echo $type; ?>">
                    <input type="hidden" name="remote_source" value="<?php soyes_the_current_uri(); ?>">
                    <input type="hidden" name="timezone">
                    <input type="hidden" name="is_desktop">
                    <input name="email" type="email" placeholder="<?php _e('Mon meilleur e-mail', 'soyes'); ?>"
                           required
                           aria-label="Adresse e-mail" class="soyes-newsletter-email wp-block-column">
                    <input type="submit"
                           class="wp-block-button__link soyes-newsletter-submit wp-block-column"
                           value="<?php _e("Rejoindre + 2100 devs 🔥", 'soyes'); ?>">
                </form><!-- .soyes-newsletter-form -->
                <small class="soyes-newsletter-warn">
                    <?php _e('Newsletter gratuite + RGPD friendly 🌱', 'soyes'); ?>
                </small><!-- .soyes-newsletter-warn -->
            </div><!-- .soyes-newsletter-fill -->
        </div><!-- .soyes-newsletter-content -->

    </div><!-- .soyes-newsletter-container -->
    <?php
    return ob_get_clean();
}
