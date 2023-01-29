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
        <div class="has-text-align-center">
            <img src="<?php echo soyes_get_the_image('logo-only', 'svg', false, false); ?>"
                 alt="<?php echo get_bloginfo('name'); ?>"
                 class="soyes-newsletter-icon"
                 width="50" height="50">

            <p class="soyes-newsletter-title">
                <?php
                _e(
                    '🚀 La console, la newsletter <span>#code</span> et <span>#freelance</span>.',
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->

            <p class="soyes-newsletter-desc">
                <strong><?php _e("✅ 1 action à réaliser chaque lundi à 10h", 'alexsoyes'); ?></strong> <?php _e("pour décrocher le job de tes rêves ou devenir freelance.", 'soyes'); ?>
            </p><!-- . soyes-newsletter-desc -->
        </div><!-- .has-text-align-center -->

        <div class="soyes-newsletter-content">
            <div class="soyes-newsletter-fill">
                <form class="soyes-newsletter-form wp-block-columns"
                      action="https://alexsoyes.us8.list-manage.com/subscribe/post?u=987967b6e21378d1da9bd507b&amp;id=1984a69e0e"
                      method="post">
                    <input name="EMAIL" type="email" placeholder="<? _e('Adresse e-mail', 'soyes'); ?>"
                           required
                           aria-label="Adresse e-mail" class="soyes-newsletter-email wp-block-column">
                    <input type="submit" class="wp-block-button__link soyes-newsletter-submit wp-block-column"
                           value="<?php _e("Rejoindre + 1500 membres", 'soyes'); ?>">
                </form><!-- .soyes-newsletter-form -->

                <small class="soyes-newsletter-warn">
                    <?php _e('Newsletter entièrement gratuite, RGPD friendly.', 'soyes'); ?>
                </small><!-- .soyes-newsletter-warn -->
            </div><!-- .soyes-newsletter-fill -->
        </div><!-- .soyes-newsletter-content -->

    </div><!-- .soyes-newsletter-container -->
    <?php
    return ob_get_clean();
}
