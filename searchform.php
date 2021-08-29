<?php
/**
 * The searchform.php template.
 *
 * Used any time that get_search_form() is called.
 *
 * @link https://developer.wordpress.org/reference/functions/wp_unique_id/
 * @link https://developer.wordpress.org/reference/functions/get_search_form/
 */

/*
 * Generate a unique ID for each form and a string containing an aria-label
 * if one was passed to get_search_form() in the args array.
 */
$soyes_aria_label = ! empty( $args['aria_label'] ) ? 'aria-label="' . esc_attr( $args['aria_label'] ) . '"' : '';
?>

<form role="search" <?php echo $soyes_aria_label; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped above. ?>
      method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <div class="search-input-container">
        <img src="<?php echo soyes_get_the_image( 'search-outline', 'svg', true, false ); ?>" width="15" height="15"
             aria-hidden="true" class="search-icon"/>
        <input type="search"
               required="true"
               class="search-input"
               aria-label="<?php _e( 'Search&hellip;', 'soyes' ); // phpcs:ignore: WordPress.Security.EscapeOutput.UnsafePrintingFunction -- core trusts translations ?>"
               value="<?php echo get_search_query(); ?>" name="s"/>
    </div>
    <input type="submit" class="wp-block-button__link search-button"
           value="<?php echo esc_attr_x( 'Search', 'submit button', 'soyes' ); ?>"/>
</form>
