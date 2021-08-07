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

    <div class="site-info">
        <div class="site-name">
			<?php if ( has_custom_logo() ) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div>
			<?php endif; ?>
        </div><!-- .site-name -->
    </div><!-- .site-info -->

	<?php if ( is_active_sidebar( 'sidebar-footer-about' ) ) : ?>
        <div class="entry-content">
			<?php dynamic_sidebar( 'sidebar-footer-about' ); ?>
        </div><!-- #prefooter -->
	<?php endif; ?>

    <div class="follow-me">
        <p class="follow-me-title"><?php echo __('On se retrouve sur', 'soyes'); ?></p>
        <ul class="follow-me-list">
            <li>
                <a href="mailto:hello@alexsoyes.com" target="_blank" title="Contacte-moi sur Twitter">
                    <img src="<?php soyes_the_social_icon( 'gmail' ); ?>" alt="Contacte-moi sur Twitter" width="30" />
                </a>
            </li>
            <li>
                <a href="https://school.alexsoyes.com/" target="_blank" title="Abonne-toi à la newsletter">
                    <img src="<?php soyes_the_social_icon( 'mailchimp' ); ?>" alt="Abonne-toi à la newsletter" width="30" />
                </a>
            </li>
            <li>
                <a href="https://feedly.com/i/subscription/feed/https://alexsoyes.com/feed/" target="_blank"
                   title="Ne manque aucun article">
                    <img src="<?php soyes_the_social_icon( 'feedly' ); ?>" alt="Ne manque aucun article" width="30" />
                </a>
            </li>
            <li>
                <a href="https://twitter.com/alexsoyes" target="_blank" title="Suis-moi sur Twitter">
                    <img src="<?php soyes_the_social_icon( 'twitter' ); ?>" alt="Suis-moi sur Twitter" width="30" />
                </a>
            </li>
        </ul>
    </div>

	<?php if ( has_nav_menu( 'footer' ) ) : ?>
        <nav aria-label="<?php esc_attr_e( 'Secondary menu', 'soyes' ); ?>" class="footer-navigation">
            <ul class="footer-navigation-wrapper">
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'footer',
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
		<?php echo esc_html__( 'Site WordPress fait avec ❤', 'soyes' ); ?>
    </div><!-- .powered-by -->
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
