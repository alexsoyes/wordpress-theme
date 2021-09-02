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
			_e( '1 unique advice<br>
                <span>every month</span>.',
				'soyes'
			);
			?>
        </h2><!-- .soyes-newsletter-title -->

        <p class="soyes-newsletter-desc">
			<?php _e( 'Eech beggining of the month, receive a unique advice to <strong>improve your developer skills</strong>, for free.', 'soyes' ); ?>
        </p><!-- . soyes-newsletter-desc -->

        <form class="soyes-newsletter-form">
            <input id="email" type="email" placeholder="<? _e( 'My email address', 'soyes' ); ?>" required
                   aria-label="Adresse e-mail" class="soyes-newsletter-email">
            <input type="submit" class="wp-block-button__link soyes-newsletter-submit"
                   value="<?php esc_html_e( "I want to receive the tips", 'soyes' ); ?>">
            <small class="soyes-newsletter-warn">
				<?php esc_html_e( "* Your email address will NEVER be used by someone other than me.", 'soyes' ); ?>
            </small><!-- .soyes-newsletter-warn -->
        </form><!-- .soyes-newsletter-form -->
    </div><!-- .soyes-newsletter-container -->
	<?php
	return ob_get_clean();
} );