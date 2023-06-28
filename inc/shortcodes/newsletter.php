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
                      action="<?php echo get_template_directory_uri(); ?>/custom/newsletter-relay.php"
                      method="post">
                    <!-- UTM -->
                    <input type="hidden" name="utm_source"
                           value="<?php echo array_key_exists('utm_source', $_GET) ? $_GET['utm_source'] : 'blog'; ?>">
                    <input type="hidden" name="utm_medium"
                           value="<?php echo array_key_exists('utm_medium', $_GET) ? $_GET['utm_medium'] : 'cpm'; ?>">
                    <input type="hidden" name="utm_content"
                           value="🚀-la-console-la-newsletter-code-et-freelance-chaque-lundi-matin-je-partage-1-nouveau-truc-de-code-appris-la-semaine-derniere-pour-devenir-meilleur-dev-2100-membres-rejoindre-la-console">
                    <input type="hidden" name="utm_campaign"
                           value="<?php echo array_key_exists('utm_campaign', $_GET) ? $_GET['utm_campaign'] : 'newsletter-homepage'; ?>">

                    <!-- La console -->
                    <input type="hidden" name="timezone" value="">
                    <input type="hidden" name="is_desktop" value="">
                    <input type="hidden" name="entity_id" value="a769bf99-cd52-48e6-8c7a-c91599dbe9d7">
                    <input type="hidden" name="remote_url_id" value="75519704189a08e194836cbb389b0de6dc60bed">
                    <input type="hidden" name="remote_source" value="<?php echo esc_url($_SERVER['REQUEST_URI']); ?>">
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
