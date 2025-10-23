<?php
function custom_theme_scripts() {
    // Enqueue Google Fonts
    wp_enqueue_style('google-fonts', 'https://fonts.googleapis.com/css2?family=Montserrat:wght@700&family=Open+Sans:wght@400;700&display=swap', array(), null);

    // Enqueue the main stylesheet
    wp_enqueue_style('custom-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

function custom_theme_setup() {
    // Register Navigation Menus
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu', 'custom-theme'),
            'footer-menu' => __('Footer Menu', 'custom-theme'),
        )
    );

    // Add theme support for post thumbnails
    add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'custom_theme_setup');

function create_custom_post_types() {
    // Services Post Type
    register_post_type('services',
        array(
            'labels' => array('name' => __('Services'), 'singular_name' => __('Service')),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'services'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        )
    );

    // Testimonials Post Type
    register_post_type('testimonials',
        array(
            'labels' => array('name' => __('Testimonials'), 'singular_name' => __('Testimonial')),
            'public' => true,
            'has_archive' => false,
            'rewrite' => array('slug' => 'testimonials'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail'),
        )
    );

    // Videos Post Type
    register_post_type('videos',
        array(
            'labels' => array('name' => __('Videos'), 'singular_name' => __('Video')),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'videos'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        )
    );

    // Events Post Type
    register_post_type('events',
        array(
            'labels' => array('name' => __('Events'), 'singular_name' => __('Event')),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array('slug' => 'events'),
            'show_in_rest' => true,
            'supports' => array('title', 'editor', 'thumbnail', 'excerpt'),
        )
    );
}
add_action('init', 'create_custom_post_types');
