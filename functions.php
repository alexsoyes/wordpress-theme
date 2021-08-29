<?php

/**
 * Functions and definitions
 */

require 'inc/template-functions.php';
require 'inc/performance.php';
require 'inc/gutenberg.php';
require 'inc/navigation.php';
require 'inc/table-of-contents.php';
require 'inc/shortcodes.php';
require 'classes/class-walker-comment.php';
require 'classes/class-walker-menu-social.php';

if ( ! function_exists( 'soyes_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function soyes_one_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Twenty Twenty-One, use a find and replace
		 * to change 'soyes' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'soyes', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * This theme does not use a hard-coded <title> tag in the document head,
		 * WordPress will provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/**
		 * Add post-formats support.
		 */
		add_theme_support(
			'post-formats',
			array(
				'link',
				'aside',
				'gallery',
				'image',
				'quote',
				'status',
				'video',
			)
		);

		if ( ! isset( $content_width ) ) {
			$content_width = 912;
		}

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

		add_image_size( 'post_content', 912 );

		register_nav_menus(
			array(
				'primary'   => esc_html__( 'Primary menu (header)', 'soyes' ),
				'secondary' => __( 'Secondary menu (footer)', 'soyes' ),
				'social'    => __( 'Social menu', 'soyes' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'navigation-widgets',
			)
		);

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */

		$logo_width  = 150;
		$logo_height = 43;
		add_theme_support(
			'custom-logo',
			array(
				'width'  => $logo_width,
				'height' => $logo_height,
			)
		);

		add_filter(
			'get_custom_logo_image_attributes',
			function ( array $custom_logo_attr ) use ( $logo_width, $logo_height ) {
				$custom_logo_attr['width']  = $logo_width;
				$custom_logo_attr['height'] = $logo_height;

				return $custom_logo_attr;
			}
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Remove unnecessary WP code from HTML output.
		soyes_performance_setup();

		// Gutenberg customization for editor.
		soyes_gutenberg_customization();
	}
}
add_action( 'after_setup_theme', 'soyes_one_setup' );

function soyes_scripts(): void {
	if ( defined( 'WP_DEBUG' ) && WP_DEBUG === true ) {
		$version = time();
	} else {
		$version = wp_get_theme()->get( 'Version' );
	}

	wp_enqueue_style( 'soyes-style', get_template_directory_uri() . '/style.css', array(), $version );
	wp_enqueue_style( 'soyes-style-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), $version );
	wp_enqueue_style( 'soyes-style-wordpress', get_template_directory_uri() . '/assets/css/wordpress.css', array(), $version );

	if ( is_single() ) {
		wp_enqueue_style( 'soyes-style-single', get_template_directory_uri() . '/assets/css/parts/single.css', array(), $version );
		wp_enqueue_style( 'soyes-style-comments', get_template_directory_uri() . '/assets/css/parts/comments.css', array(), $version );
		wp_enqueue_style( 'soyes-style-element-content', get_template_directory_uri() . '/assets/css/elements/content.css', array(), $version );
		wp_enqueue_style( 'soyes-style-block-library', get_template_directory_uri() . '/assets/css/block-library.css', array(), $version );
		wp_enqueue_script( 'soyes-script-share', get_template_directory_uri() . '/assets/js/share.js', array(), $version );
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'soyes-style-front-page', get_template_directory_uri() . '/assets/css/parts/front-page.css', array(), $version );
		wp_enqueue_style( 'soyes-style-element-content', get_template_directory_uri() . '/assets/css/elements/content.css', array(), $version );
		wp_enqueue_style( 'soyes-style-block-library', get_template_directory_uri() . '/assets/css/block-library.css', array(), $version );
	}

	if ( is_page() ) {
		wp_enqueue_style( 'soyes-style-element-content', get_template_directory_uri() . '/assets/css/elements/content.css', array(), $version );
		wp_enqueue_style( 'soyes-style-block-library', get_template_directory_uri() . '/assets/css/block-library.css', array(), $version );
	}

	if ( is_404() ) {
		wp_enqueue_style( 'soyes-style-element-content', get_template_directory_uri() . '/assets/css/elements/content.css', array(), $version );
		wp_enqueue_style( 'soyes-style-block-library', get_template_directory_uri() . '/assets/css/block-library.css', array(), $version );
		wp_enqueue_style( 'soyes-style-404', get_template_directory_uri() . '/assets/css/parts/404.css', array(), $version );
	}

	if ( is_home() ) {
		wp_enqueue_style( 'soyes-style-home', get_template_directory_uri() . '/assets/css/parts/home.css', array(), $version );
	}

	if ( is_category() ) {
		wp_enqueue_style( 'soyes-style-home', get_template_directory_uri() . '/assets/css/parts/category.css', array(), $version );
	}

	if ( is_home() || is_category() || is_search() ) {
		wp_enqueue_style( 'soyes-style-element-categories', get_template_directory_uri() . '/assets/css/elements/categories.css', array(), $version );
		wp_enqueue_style( 'soyes-style-element-card', get_template_directory_uri() . '/assets/css/elements/card.css', array(), $version );
	}

	if ( is_search() ) {
		wp_enqueue_style( 'soyes-style-block-library', get_template_directory_uri() . '/assets/css/block-library.css', array(), $version );
		wp_enqueue_style( 'soyes-style-search', get_template_directory_uri() . '/assets/css/parts/search.css', array(), $version );

	}

	wp_deregister_style( 'wp-block-library' );
	wp_deregister_script( 'wp-block-library' );
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_enqueue_scripts', 'soyes_scripts' );

function soyes_sidebar(): void {
	register_sidebar(
		array(
			'name'          => __( 'Footer text', 'soyes' ),
			'id'            => 'sidebar-footer-about',
			'description'   => __( 'Display some basic info about who you are in the footer.', 'soyes' ),
			'before_widget' => '<div>',
			'after_widget'  => '</div>',
		)
	);
}

add_action( 'widgets_init', 'soyes_sidebar' );
