<?php

/**
 * The template for displaying the footer
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part('template-parts/footer/footer-widgets'); ?>

<footer id="colophon" class="site-footer">

    <?php if (is_active_sidebar('sidebar-footer-about')) : ?>
        <?php dynamic_sidebar('sidebar-footer-about'); ?>
    <?php endif; ?>

    <div class="follow-me">
        <p class="follow-me-title"><?php echo __('Keep in touch', 'soyes'); ?></p><!-- .follow-me-title -->
        <ul class="follow-me-list">
            <?php
            wp_nav_menu(
                array(
                    'walker' => new SoYes_Walker_Nav_Menu_Social(),
                    'theme_location' => 'social',
                    'items_wrap' => '%3$s',
                    'container' => false,
                    'fallback_cb' => false,
                    'depth' => 1,
                )
            );
            ?>
        </ul><!-- follow-me-list -->
    </div><!-- .follow-me -->

    <?php if (has_nav_menu('secondary')) : ?>
        <nav aria-label="<?php esc_attr_e('Secondary menu', 'soyes'); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'walker' => new SoYes_Walker_Nav_Menu_JS_Links(),
                        'theme_location' => 'secondary',
                        'items_wrap' => '%3$s',
                        'container' => false,
                        'depth' => 1,
                        'link_before' => '<span>',
                        'link_after' => '</span>',
                        'fallback_cb' => false,
                    )
                );
                ?>
            </ul><!-- .footer-navigation-wrapper -->
        </nav><!-- .footer-navigation -->
    <?php endif; ?>

    <div class="powered-by">
        <?php echo esc_html__("Blog d'un développeur web freelance et digital nomad.", 'soyes'); ?>
    </div><!-- .powered-by -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

<script id="form-script-tag-17953057" src="https://learn.alexsoyes.com/public/remote/page/28688715a383a14111beb633759af347cad939c6.js"></script>

</body>
</html>
