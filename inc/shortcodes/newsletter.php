<?php

/**
 * Simple newsletter block
 *
 * @todo move outside the theme
 */

add_shortcode( 'soyes_newsletter', function () {
	ob_start();
	?>
    <div class="soyes-newsletter-container">

        <img src="<?php echo soyes_get_the_image( 'logo-only', 'svg', false, false ) ?>"
             alt="<?php echo get_bloginfo( 'name' ); ?>"
             class="soyes-newsletter-icon"
             width="50" height="50">

        <h2 class="soyes-newsletter-title">
			<?php
			_e( '1 conseil unique<br>
                <span>1 fois par mois</span>.',
				'soyes'
			);
			?>
        </h2>

        <p class="soyes-newsletter-desc">
			<?php _e( 'Chaque mois, reçois gratuitement un conseil unique pour <strong>progresser en tant que développeur.</strong>', 'soyes' ); ?>
        </p>

        <form class="soyes-newsletter-form">
            <input id="email" type="email" placeholder="Mon adresse mail principale" required
                   aria-label="Adresse e-mail" class="soyes-newsletter-email">
            <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                   value="<?php esc_html_e( "Je m'inscris", 'soyes' ); ?>">
            <small class="soyes-newsletter-warn">
				<?php esc_html_e( "* Ton adresse e-mail ne sera JAMAIS utilisé par quelqu'un d'autre.", 'soyes' ); ?>
            </small>
        </form>
    </div>
	<?php
	return ob_get_clean();
} );