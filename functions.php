<?php
/**
 * Functions and definitions
 */

require "inc/template-functions.php";
require "inc/navigation.php";
require 'inc/table-of-contents.php';
require 'inc/shortcodes.php';
require "classes/class-walker-comment.php";

if ( ! function_exists( 'soyes_one_setup' ) ) {
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
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
			$content_width = 600;
		}

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );
		set_post_thumbnail_size( 1568, 9999 );

//		add_image_size();

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary menu', 'soyes' ),
				'footer'  => __( 'Secondary menu', 'soyes' ),
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
		$logo_width  = 300;
		$logo_height = 100;

		add_theme_support( 'custom-logo',
			array(
				'height'               => $logo_height,
				'width'                => $logo_width,
				'flex-width'           => true,
				'flex-height'          => true,
				'unlink-homepage-logo' => true,
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for Block Styles.
//		add_theme_support( 'wp-block-styles' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );
	}
}
add_action( 'after_setup_theme', 'soyes_one_setup' );

function soyes_scripts() {

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
	}

	if ( is_front_page() ) {
		wp_enqueue_style( 'soyes-style-front-page', get_template_directory_uri() . '/assets/css/parts/front-page.css', array(), $version );
	}

	if ( is_home() ) {
		wp_enqueue_style( 'soyes-style-home', get_template_directory_uri() . '/assets/css/parts/home.css', array(), $version );
	}

	if ( is_category() ) {
		wp_enqueue_style( 'soyes-style-home', get_template_directory_uri() . '/assets/css/parts/category.css', array(), $version );
	}

	if ( is_home() || is_category() ) {
		wp_enqueue_style( 'soyes-style-element-categories', get_template_directory_uri() . '/assets/css/elements/categories.css', array(), $version );
		wp_enqueue_style( 'soyes-style-element-card', get_template_directory_uri() . '/assets/css/elements/card.css', array(), $version );
	}

	wp_deregister_script( 'wp-block-library' );
	wp_deregister_script( 'wp-embed' );
}

add_action( 'wp_enqueue_scripts', 'soyes_scripts' );