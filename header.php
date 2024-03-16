<?php

/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 */

?>
<!doctype html>
<html <?php language_attributes(); ?> itemscope itemtype="http://schema.org/WebPage">
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (is_single() || is_front_page() || is_page() || is_404()) : ?>
        <link rel="prefetch"
              href="<?php echo esc_url(wp_get_attachment_url(get_theme_mod('custom_logo'))); ?>"
              crossorigin="anonymous">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,400;0,700;1,400;1,700&family=Rokkitt:wght@700&display=swap"
          rel="stylesheet">
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<!-- Google Tag Manager (noscript) -->
<noscript>
    <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NM5CDDP" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
</noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'soyes'); ?></a>

    <?php get_template_part('template-parts/cta/banner-cta'); ?>

    <header id="header" class="alignfull">
        <div class="header-container">
            <?php if (has_custom_logo()) : ?>
                <div class="site-logo"><?php the_custom_logo(); ?></div><!-- .site-logo -->
            <?php else : ?>
                <a href="<?php echo home_url(); ?>" id="site-home">
                    <span class="site-logo-text"><?php echo get_bloginfo('name'); ?></span><!-- .site-logo-text -->
                </a><!-- #site-home -->
            <?php endif; ?>

            <?php if (has_nav_menu('primary')) : ?>
                <nav id="site-navigation" class="primary-navigation"
                     aria-label="<?php esc_attr_e('Primary menu', 'soyes'); ?>">
                    <?php
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class' => 'menu-wrapper',
                            'container_class' => 'primary-menu-container',
                            'items_wrap' => '<ul id="primary-menu-list" class="%2$s">%3$s</ul>',
                            'fallback_cb' => false,
                        )
                    );
                    ?>
                </nav><!-- #site-navigation -->
            <?php endif; ?>
        </div><!--. header-container -->
    </header><!-- #header -->

    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
