<?php

/**
 * Functions and definitions
 */

require 'inc/template-functions.php';
require 'inc/post-order.php';
require 'inc/performance.php';
require 'inc/gutenberg.php';
require 'inc/navigation.php';
require 'inc/table-of-contents.php';
require 'inc/shortcodes/toc.php';
require 'inc/shortcodes/newsletter.php';
require 'classes/class-walker-comment.php';
require 'classes/class-walker-menu-social.php';

if (defined('WP_DEBUG') && WP_DEBUG === true) {
    $version = time();
} else {
    $version = wp_get_theme()->get('Version');
}

if (!function_exists('soyes_one_setup')) {
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function soyes_one_setup()
    {
        load_theme_textdomain('soyes', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * This theme does not use a hard-coded <title> tag in the document head,
         * WordPress will provide it for us.
         */
        add_theme_support('title-tag');

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

        if (!isset($content_width)) {
            $content_width = 912;
        }

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        set_post_thumbnail_size(1568, 9999);

        add_image_size('post_content', 912);

        register_nav_menus(
            array(
                'primary' => esc_html__('Primary menu (header)', 'soyes'),
                'secondary' => __('Secondary menu (footer)', 'soyes'),
                'social' => __('Social menu', 'soyes'),
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

        $logo_width = 150;
        $logo_height = 43;
        add_theme_support(
            'custom-logo',
            array(
                'width' => $logo_width,
                'height' => $logo_height,
            )
        );

        add_filter(
            'get_custom_logo_image_attributes',
            function (array $custom_logo_attr) use ($logo_width, $logo_height) {
                $custom_logo_attr['width'] = $logo_width;
                $custom_logo_attr['height'] = $logo_height;

                return $custom_logo_attr;
            }
        );

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        // Add support for full and wide align images.
        add_theme_support('align-wide');

        // Remove unnecessary WP code from HTML output.
        soyes_performance_setup();

        // Gutenberg customization for editor.
        soyes_gutenberg_customization();

        // Remove the wp-container-random and the generated alignments, margins, and flex styles
        // https://stackoverflow.com/questions/71147452/wordpress-gutenberg-fse-annoying-inline-css
        remove_filter('render_block', 'wp_render_layout_support_flag');
    }
}
add_action('after_setup_theme', 'soyes_one_setup');

/**
 * @param string $tag
 *
 * @return string
 */
function soyes_make_script_async(string $tag): string
{

    if (is_admin()) {
        return $tag;
    }

    if ((strpos($tag, 'comment-reply-js') !== -1) ||
        strpos($tag, 'soyes-script-share-js') !== -1) {
        return str_replace(' src', ' async="async" src', $tag);
    }

    return $tag;
}

add_filter('script_loader_tag', 'soyes_make_script_async', 10);


function soyes_scripts(): void
{
    if (is_admin()) {
        return;
    }

    global $version;

    wp_enqueue_style('soyes-style', get_template_directory_uri() . '/style.css', array(), $version);
    wp_enqueue_style('soyes-style-normalize', get_template_directory_uri() . '/assets/css/normalize.css', array(), $version);

    if (is_user_logged_in() && is_single() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }

    if (is_single()) {
        wp_enqueue_style('soyes-style-single', get_template_directory_uri() . '/assets/css/parts/single.css', array(), $version);
        wp_enqueue_script('soyes-script-share', get_template_directory_uri() . '/assets/js/share.js', array(), $version, true);
    }

    if (!is_front_page()) {
        wp_enqueue_style('soyes-style-header', get_template_directory_uri() . '/assets/css/elements/header.css', array(), $version);
    }

    if (is_front_page()) {
        wp_enqueue_style('soyes-style-front-page', get_template_directory_uri() . '/assets/css/parts/front-page.css', array(), $version);
    }

    if (is_404()) {
        wp_enqueue_style('soyes-style-404', get_template_directory_uri() . '/assets/css/parts/404.css', array(), $version);
        wp_enqueue_style('soyes-style-search', get_template_directory_uri() . '/assets/css/parts/search.css', array(), $version);
    }

    if (is_home() || is_category() || is_search()) {
        wp_enqueue_style('soyes-style-search', get_template_directory_uri() . '/assets/css/parts/search.css', array(), $version);
        wp_enqueue_style('soyes-style-element-card', get_template_directory_uri() . '/assets/css/elements/card.css', array(), $version);
        wp_enqueue_style('soyes-style-element-hero', get_template_directory_uri() . '/assets/css/elements/hero.css', array(), $version);
    }

    if (is_category()) {
        wp_enqueue_style('soyes-style-element-categories', get_template_directory_uri() . '/assets/css/elements/categories.css', array(), $version);
    }

    global $post;

    // included everywhere because is in footer.
    wp_enqueue_style('soyes-style-shortcode-newsletter', get_template_directory_uri() . '/assets/css/shortcodes/newsletter.css', array(), $version);

    if ($post) {
        if (is_single() && has_shortcode($post->post_content, 'soyes_toc')) {
            wp_enqueue_style('soyes-style-shortcode-toc', get_template_directory_uri() . '/assets/css/shortcodes/toc.css', array(), $version);
        }
    }

    wp_deregister_style('wp-block-library');
    wp_deregister_script('wp-block-library');
    wp_deregister_script('wp-embed');
}

add_action('wp_enqueue_scripts', 'soyes_scripts');

function soyes_sidebar(): void
{
    register_sidebar(
        array(
            'name' => __('Footer text', 'soyes'),
            'id' => 'sidebar-footer-about',
            'description' => __('Display some basic info about who you are in the footer.', 'soyes'),
            'before_widget' => '<div>',
            'after_widget' => '</div>',
        )
    );
}

add_action('widgets_init', 'soyes_sidebar');


function soyes_build_async_uri(string $handle): string
{
    global $version;
    return sprintf("%s/wp-content/themes/soyes/assets/css/async-blocks/%s.css?v=%s", get_site_url(), $handle, $version);
}

/**
 * https://web.dev/defer-non-critical-css/#optimize
 */
function soyes_enqueue_async_styles(): void
{
    $cssToEmbed = [];
    $cssToEmbed[] = soyes_build_async_uri('footer');

    if (is_single()) {
        $cssToEmbed[] = soyes_build_async_uri('single-comments');
        $cssToEmbed[] = soyes_build_async_uri('single-social');
    }

    if (is_single() || is_page() || is_404() || is_front_page()) {
        $cssToEmbed[] = soyes_build_async_uri('content');
    }

    foreach ($cssToEmbed as $css): ?>
        <link rel="preload" href="<?php echo $css; ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
        <noscript>
            <link rel="stylesheet" href="<?php echo $css; ?>">
        </noscript>
    <?php
    endforeach;
}

add_action('wp_head', 'soyes_enqueue_async_styles');

function soyes_exit_popin(): void
{
    if (!is_front_page()):
        ?>
        <script id="mcjs">!function (c, h, i, m, p) {
                m = c.createElement(h), p = c.getElementsByTagName(h)[0], m.async = 1, m.src = i, p.parentNode.insertBefore(m, p)
            }(document, "script", "https://chimpstatic.com/mcjs-connected/js/users/987967b6e21378d1da9bd507b/2684253fd7b4cc3c3650fde16.js");</script><?php
    endif;
}

add_action('wp_footer', 'soyes_exit_popin');
