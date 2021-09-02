<?php
/**
 * The template for displaying 404 pages (not found)
 */

$dinosaur = soyes_get_the_image( 'dinosaur', 'svg', true, false );

get_header();
?>

    <div class="error-404 not-found default-max-width">
        <div class="entry-content">
            <div class="wp-block-columns">
                <div class="wp-block-column is-vertically-aligned-bottom">
                    <img src="<?php echo $dinosaur; ?>" alt="<?php esc_html_e( 'Dinosaure 404', 'soyes' ); ?>"
                         width="300"
                         class="aligncenter">
                </div><!-- .wp-block-column -->
                <div class="wp-block-column">
                    <h1><?php echo esc_html_e( 'Damned!', 'soyes' ) ?></h1>
                    <p><?php esc_html_e( 'That page does not exist (anymore?)!', 'soyes' ); ?></p>
                    <p><?php _e( 'I am tracking <code>404 errors</code> in order to replace them with <code>301 redirections</code> in case of missing posts (which is very rare by the way).', 'soyes' ); ?></p>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->

            <h2><?php esc_html_e( 'Wanna try to search for your post? 🍀', 'soyes' ); ?></h2>

	        <?php get_search_form(); ?>

            <p><?php
		        $admin_email = get_option( 'admin_email' );
		        printf(
		        /* translators: %s is replaced with the admin email address. */
			        __( 'If you arrived here, please send a kindly message to %s with the post you were looking for.', 'soyes' ), "<a href=\"mailto:$admin_email\">$admin_email</a>" ); ?>
            </p>

            <p><?php esc_html_e( 'We will reply shorter than you think!', 'soyes' ); ?></p>

            <div>
                <a href="<?php echo get_home_url( '/' ) ?>"
                   title="<?php esc_html_e( 'Return to home', 'soyes' ) ?>"
                   class="wp-block-button__link">
			        <?php esc_html_e( 'return "/";', 'soyes' ) ?>
                </a>
                <a href="<?php echo get_post_type_archive_link( 'post' ); ?>"
                   title="<?php esc_html_e( 'Find all posts', 'soyes' ) ?>"
                   class="wp-block-button__link">
					<?php esc_html_e( 'find_all_articles();', 'soyes' ) ?>
                </a>
            </div>
        </div><!-- .entry-content -->
    </div><!-- .error-404 -->

<?php
get_footer();
