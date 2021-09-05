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
function soyes_newsletter( $atts = array() ): string {
	$container_class = 'soyes-newsletter-container';

	$additional_class = is_array( $atts ) && array_key_exists( 'class', $atts ) ? $atts['class'] : false;

	if ( $additional_class ) {
		$container_class = "$container_class $additional_class";
	}

	ob_start();
	?>
    <div class="<?php echo esc_html( $container_class ); ?>">
        <img src="<?php echo soyes_get_the_image( 'logo-only', 'svg', false, false ); ?>"
             alt="<?php echo get_bloginfo( 'name' ); ?>"
             class="soyes-newsletter-icon"
             width="50" height="50">

        <h2 class="soyes-newsletter-title">
			<?php
			_e(
				'1 unique advice<br>
                <span>every month</span>.',
				'soyes'
			);
			?>
        </h2><!-- .soyes-newsletter-title -->

        <div class="soyes-newsletter-content">
            <p class="soyes-newsletter-desc">
			    <?php _e( 'Eech beggining of the month, receive a unique advice to <strong>improve your developer skills</strong>, for free.', 'soyes' ); ?>
            </p><!-- . soyes-newsletter-desc -->

            <form class="soyes-newsletter-form"
                  action="https://alexsoyes.us8.list-manage.com/subscribe/post?u=987967b6e21378d1da9bd507b&amp;id=1984a69e0e"
                  method="post">
                <input name="EMAIL" type="email" placeholder="<? _e( 'My email address', 'soyes' ); ?>" required
                       aria-label="Adresse e-mail" class="soyes-newsletter-email">
                <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                       value="<?php esc_html_e( 'I want to receive the tips', 'soyes' ); ?>">
                <small class="soyes-newsletter-warn">
				    <?php esc_html_e( '* Your email address will NEVER be used by someone other than me.', 'soyes' ); ?>
                </small><!-- .soyes-newsletter-warn -->
            </form><!-- .soyes-newsletter-form -->
        </div><!-- .soyes-newsletter-content -->

    </div><!-- .soyes-newsletter-container -->
	<?php
	return ob_get_clean();
}
