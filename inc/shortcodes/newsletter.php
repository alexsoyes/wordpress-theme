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
           <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/IU2xOG2Z2T0?si=HnOmJEwQjLxv8Bk0" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
        </div><!-- .soyes-newsletter-fill -->

           <a href="https://youtube.com/@alexsoyes?sub_confirmation=1"
           target="_blank"
           class="wp-block-button__link soyes-newsletter-button wp-block-column">
           ⚡ S'abonner à la chaîne YouTube
           </a>


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
                    "Le blog d'un codeur <span>augmenté à l·'IA</span>",
                    'soyes'
                );
                ?>
            </p><!-- .soyes-newsletter-title -->
            <p class="soyes-newsletter-desc">
                <?php _e("Cela fait 2 ans que je fais de la R&D sur l'IA, <strong>aujourd'hui c'est une évidence,</strong> nous nous devons de prendre de l'avance.", 'alexsoyes'); ?>
            </p><!-- . soyes-newsletter-desc -->
        </div>
        <?php echo do_shortcode('[soyes_newsletter_form type="' . $type . '"]'); ?>
    </div><!-- .soyes-newsletter-container -->
    <?php
    return ob_get_clean();
}
