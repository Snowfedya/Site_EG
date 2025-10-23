<?php
function custom_theme_scripts() {
    wp_enqueue_style('custom-theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'custom_theme_scripts');

function custom_theme_setup() {
    register_nav_menus(
        array(
            'primary-menu' => __('Primary Menu', 'custom-theme'),
        )
    );
}
add_action('after_setup_theme', 'custom_theme_setup');
