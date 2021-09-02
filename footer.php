<?php

/**
 * The template for displaying the footer
 */

?>
</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<?php get_template_part( 'template-parts/footer/footer-widgets' ); ?>

<footer id="colophon" class="site-footer" role="contentinfo">

	<?php if ( is_active_sidebar( 'sidebar-footer-about' ) ) : ?>
        <div class="entry-content">
			<?php dynamic_sidebar( 'sidebar-footer-about' ); ?>
        </div><!-- #prefooter -->
	<?php endif; ?>

    <div class="follow-me">
        <p class="follow-me-title"><?php echo __( 'On se retrouve sur', 'soyes' ); ?></p>
        <ul class="follow-me-list">
			<?php
			wp_nav_menu(
				array(
					'walker'         => new SoYes_Walker_Nav_Menu_Social(),
					'theme_location' => 'social',
					'items_wrap'     => '%3$s',
					'container'      => false,
					'fallback_cb'    => false,
					'depth'          => 1,
				)
			);
			?>
        </ul><!-- follow-me-list -->
    </div><!-- .follow-me -->

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'soyes' ); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'secondary',
						'items_wrap'     => '%3$s',
						'container'      => false,
						'depth'          => 1,
						'link_before'    => '<span>',
						'link_after'     => '</span>',
						'fallback_cb'    => false,
					)
				);
				?>
            </ul><!-- .footer-navigation-wrapper -->
        </nav><!-- .footer-navigation -->
	<?php endif; ?>

    <div class="powered-by">
		<?php echo esc_html__( 'Made with love on the top of WordPress ❤️', 'soyes' ); ?>
    </div><!-- .powered-by -->

</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
