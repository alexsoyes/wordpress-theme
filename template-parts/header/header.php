<?php
/**
 * Global header.
 */
?>
<header id="header" class="alignfull">
    <div class="header-container">
        <a href="<?php echo home_url(); ?>" id="site-home">
		    <?php if ( has_custom_logo() ) : ?>
                <span class="site-logo"><?php the_custom_logo(); ?></span>
		    <?php else: ?>
                <span class="site-logo-text"><?php echo get_bloginfo( 'name' ); ?></span>
		    <?php endif; ?>
        </a><!-- #site-home -->

	    <?php if ( has_nav_menu( 'primary' ) ) : ?>
            <nav id="site-navigation" class="primary-navigation" role="navigation"
                 aria-label="<?php esc_attr_e( 'Primary menu', 'soyes' ); ?>">
			    <?php
			    wp_nav_menu(
				    array(
					    'theme_location'  => 'primary',
					    'menu_class'      => 'menu-wrapper',
					    'container_class' => 'primary-menu-container',
					    'items_wrap'      => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
					    'fallback_cb'     => false,
				    )
			    );
			    ?>
            </nav><!-- #site-navigation -->
	    <?php endif; ?>
    </div>
</header>
