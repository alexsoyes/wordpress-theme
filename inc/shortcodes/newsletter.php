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
function soyes_newsletter($atts = array()): string
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
                    'Receive <span>&lt;la console /&gt;</span>.',
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->

            <p class="soyes-newsletter-desc">
                <?php _e('✨ Being developer is a passion.', 'soyes'); ?>
            </p><!-- . soyes-newsletter-desc -->
        </div><!-- .has-text-align-center -->

        <div class="soyes-newsletter-content">

            <div class="wp-block-columns are-vertically-aligned-center">
                <div class="wp-block-column wp-block-column-33 soyes-newsletter-fill">
                    <p><?php _e('<span>Each beginning</span> of the week,', 'soyes'); ?></p>
                    <p><?php _e('I will share you <span>something I learned</span>.', 'soyes'); ?></p>

                    <form class="soyes-newsletter-form"
                          action="https://alexsoyes.us8.list-manage.com/subscribe/post?u=987967b6e21378d1da9bd507b&amp;id=1984a69e0e"
                          method="post">
                        <input name="EMAIL" type="email" placeholder="<? _e('My email address', 'soyes'); ?>" required
                               aria-label="Adresse e-mail" class="soyes-newsletter-email">
                        <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                               value="<?php _e('Join the community!', 'soyes'); ?>">
                    </form><!-- .soyes-newsletter-form -->

                    <small class="soyes-newsletter-warn">
                        <?php _e('* Your email stays with me, your privacy matters. 🕵️', 'soyes'); ?>
                    </small><!-- .soyes-newsletter-warn -->
                </div><!-- .soyes-newsletter-fill -->

                <div class="wp-block-column wp-block-column-66 soyes-newsletter-advantages">
                    <p><?php _e('🎁 <span>Bonus gift</span>: Receive my 5 bonus emails to become a better software developer.', 'soyes'); ?></p>

                    <ul class="simple">
                        <li><?php _e('🗺️ <strong>3 Roadmaps</strong> to became a better software developer.', 'soyes'); ?></li>
                        <li><?php _e('🧠 How I start my day to <strong>increase my productivity</strong>.', 'soyes'); ?></li>
                        <li><?php _e('🛠 <strong>3 tools</strong> for developers (that you must use).', 'soyes'); ?></li>
                        <li><?php _e('😍 A curated selection of the <strong>best french ressources</strong> for coding.', 'soyes'); ?></li>
                        <li><?php _e('🧑‍💻 What I think about <strong>software engineers jobs</strong> for the next year.', 'soyes'); ?></li>
                    </ul><!-- .simple -->

                </div><!-- .soyes-newsletter-advantages -->
            </div><!-- .wp-block-columns -->
        </div><!-- .soyes-newsletter-content -->

    </div><!-- .soyes-newsletter-container -->
    <?php
    return ob_get_clean();
}
