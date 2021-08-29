<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
	<?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;700;800&display=swap" rel="stylesheet">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'soyes' ); ?></a>

	<?php if ( ! is_front_page() ) : ?>

        <header id="header" class="alignfull">
            <div class="header-container">
				<?php if ( has_custom_logo() ) : ?>
                    <div class="site-logo"><?php the_custom_logo(); ?></div>
				<?php else : ?>
                    <a href="<?php echo home_url(); ?>" id="site-home">
                        <span class="site-logo-text"><?php echo get_bloginfo( 'name' ); ?></span>
                    </a><!-- #site-home -->
				<?php endif; ?>

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
            </div><!--. header-container -->
        </header><!-- #header -->

	<?php endif; ?>

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main" role="main">
