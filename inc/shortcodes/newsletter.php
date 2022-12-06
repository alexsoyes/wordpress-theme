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
function soyes_newsletter(array $atts = []): string
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
                    'Rejoins le <span>top 10%</span> de la Tech.',
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->

            <p class="soyes-newsletter-desc">
                <?php _e("Ta dose d’inspiration <strong>tech</strong> et <strong>freelance</strong> et <strong>digital nomad</strong>.", 'soyes'); ?>
            </p><!-- . soyes-newsletter-desc -->

        </div><!-- .has-text-align-center -->

        <div class="soyes-newsletter-calendar">
            <p><?php _e('<strong>Chaque mardi</strong>, on avance ensemble pour level-up ⚡️', 'soyes'); ?></p>
        </div><!-- .soyes-newsletter-calendar -->

        <div class="soyes-newsletter-content">

            <div class="soyes-newsletter-fill">
                <p><?php _e('Rejoins les +1500 membres de <span>&lt;la console /&gt;</span>.', 'soyes'); ?></p>

                <form class="soyes-newsletter-form wp-block-columns"
                      action="https://alexsoyes.us8.list-manage.com/subscribe/post?u=987967b6e21378d1da9bd507b&amp;id=1984a69e0e"
                      method="post">
                    <input name="EMAIL" type="email" placeholder="<? _e('My email address', 'soyes'); ?>"
                           required
                           aria-label="Adresse e-mail" class="soyes-newsletter-email wp-block-column">
                    <input type="submit" class="wp-block-button__link soyes-newsletter-submit wp-block-column"
                           value="<?php _e('Je veux ma dose 💊', 'soyes'); ?>">
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
