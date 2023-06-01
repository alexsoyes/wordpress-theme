<?php
/**
 * The template for displaying 404 pages (not found)
 */
get_header();
?>

    <article class="error-404 not-found default-max-width" data-clarity-region="404">
        <div class="entry-content">
            <div class="wp-block-columns">
                <div class="wp-block-column">
                    <h1><?php esc_html_e('Damned!', 'soyes') ?></h1>
                    <p><?php _e('I am tracking <code>404 errors</code> in order to replace them with <code>301 redirections</code> in case of missing posts (which is very rare by the way).', 'soyes'); ?></p>

                    <p><?php
                        $admin_email = get_option('admin_email');
                        printf(
                        /* translators: %s is replaced with the admin email address. */
                            __('If you arrived here, please send a kindly message to %s with the post you were looking for.', 'soyes'), "<a href=\"mailto:$admin_email\">$admin_email</a>"); ?>
                    </p>

                    <p>
                        <strong>
                            <?php esc_html_e('Wanna try to search for your post? 🍀', 'soyes'); ?>
                        </strong>
                    </p>
                    <?php get_search_form(); ?>

                </div><!-- .wp-block-column -->
                <div class="wp-block-column is-vertically-aligned-bottom">
                    <img src="https://alexsoyes.com/wp-content/uploads/2023/06/alexsoyes-salut-scaled.jpg"
                         alt="<?php esc_html_e('404', 'soyes'); ?>"
                         width="300"
                         class="aligncenter">
                    <?php get_template_part('template-parts/elements/return-categories'); ?>
                </div><!-- .wp-block-column -->
            </div><!-- .wp-block-columns -->
        </div><!-- .entry-content -->
    </article><!-- .error-404 -->

<?php
get_footer();
