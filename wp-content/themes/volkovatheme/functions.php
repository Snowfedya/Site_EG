<?php
/**
 * Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Theme setup.
 */
function volkova_theme_setup() {
    // Add default posts and comments RSS feed links to head.
    add_theme_support( 'automatic-feed-links' );

    // Let WordPress manage the document title.
    add_theme_support( 'title-tag' );

    // Enable support for Post Thumbnails on posts and pages.
    add_theme_support( 'post-thumbnails' );

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'primary' => esc_html__( 'Primary Menu', 'volkovatheme' ),
        )
    );

    // Switch default core markup for search form, comment form, and comments to output valid HTML5.
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );
}
add_action( 'after_setup_theme', 'volkova_theme_setup' );

/**
 * Enqueue scripts and styles.
 */
function volkova_theme_scripts() {
    // Google Fonts
    wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&family=Playfair+Display:wght@700&display=swap', array(), null );

    // Main Stylesheet
    wp_enqueue_style( 'volkova-main-style', get_template_directory_uri() . '/css/main.min.css', array(), '1.0.0' );

    // Main JS
    wp_enqueue_script( 'volkova-main-script', get_template_directory_uri() . '/js/main.min.js', array('jquery'), '1.0.0', true );

}
add_action( 'wp_enqueue_scripts', 'volkova_theme_scripts' );

/**
 * Custom post types.
 */
require_once get_template_directory() . '/inc/custom-post-types.php';

/**
 * Custom fields.
 */
require_once get_template_directory() . '/inc/custom-fields.php';

/**
 * Theme options.
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Contact form.
 */
require_once get_template_directory() . '/inc/contact-form.php';

/**
 * Performance Optimization.
 */

/**
 * Add lazy loading to images.
 */
function volkova_theme_add_lazy_loading( $content ) {
    $content = preg_replace( '/<img(.*?)src=/', '<img$1src= src="data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7" data-src=', $content );
    $content = preg_replace( '/<img(.*?)srcset=/', '<img$1srcset= data-srcset=', $content );
    $content = str_replace( '<img', '<img loading="lazy"', $content );
    return $content;
}
add_filter( 'the_content', 'volkova_theme_add_lazy_loading' );

/**
 * SEO & Marketing.
 */

/**
 * Add OpenGraph meta tags.
 */
function volkova_theme_add_opengraph_tags() {
    if ( is_singular() ) {
        global $post;
        $image = get_the_post_thumbnail_url( $post->ID, 'full' );
        $description = get_the_excerpt( $post->ID );
        ?>
        <meta property="og:title" content="<?php the_title(); ?>" />
        <meta property="og:description" content="<?php echo esc_attr( $description ); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="<?php the_permalink(); ?>" />
        <meta property="og:site_name" content="<?php bloginfo( 'name' ); ?>" />
        <?php if ( $image ) : ?>
            <meta property="og:image" content="<?php echo esc_url( $image ); ?>" />
        <?php endif; ?>
        <?php
    }
}
add_action( 'wp_head', 'volkova_theme_add_opengraph_tags' );
