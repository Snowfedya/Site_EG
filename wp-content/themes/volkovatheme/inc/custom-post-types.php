<?php
/**
 * Custom Post Types
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register custom post types.
 */
function volkova_theme_register_post_types() {
    // Services
    $service_labels = array(
        'name'                  => _x( 'Services', 'Post type general name', 'volkovatheme' ),
        'singular_name'         => _x( 'Service', 'Post type singular name', 'volkovatheme' ),
        'menu_name'             => _x( 'Services', 'Admin Menu text', 'volkovatheme' ),
        'name_admin_bar'        => _x( 'Service', 'Add New on Toolbar', 'volkovatheme' ),
        'add_new'               => __( 'Add New', 'volkovatheme' ),
        'add_new_item'          => __( 'Add New Service', 'volkovatheme' ),
        'new_item'              => __( 'New Service', 'volkovatheme' ),
        'edit_item'             => __( 'Edit Service', 'volkovatheme' ),
        'view_item'             => __( 'View Service', 'volkovatheme' ),
        'all_items'             => __( 'All Services', 'volkovatheme' ),
        'search_items'          => __( 'Search Services', 'volkovatheme' ),
        'parent_item_colon'     => __( 'Parent Services:', 'volkovatheme' ),
        'not_found'             => __( 'No services found.', 'volkovatheme' ),
        'not_found_in_trash'    => __( 'No services found in Trash.', 'volkovatheme' ),
        'featured_image'        => _x( 'Service Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'volkovatheme' ),
        'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'volkovatheme' ),
        'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'volkovatheme' ),
        'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'volkovatheme' ),
        'archives'              => _x( 'Service archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'volkovatheme' ),
        'insert_into_item'      => _x( 'Insert into service', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'volkovatheme' ),
        'uploaded_to_this_item' => _x( 'Uploaded to this service', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'volkovatheme' ),
        'filter_items_list'     => _x( 'Filter services list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'volkovatheme' ),
        'items_list_navigation' => _x( 'Services list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'volkovatheme' ),
        'items_list'            => _x( 'Services list', 'Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'volkovatheme' ),
    );

    $service_args = array(
        'labels'             => $service_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'services' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt' ),
        'menu_icon'          => 'dashicons-format-aside',
    );

    register_post_type( 'service', $service_args );

    // Videos
    $video_labels = array(
        'name'                  => _x( 'Videos', 'Post type general name', 'volkovatheme' ),
        'singular_name'         => _x( 'Video', 'Post type singular name', 'volkovatheme' ),
        'menu_name'             => _x( 'Videos', 'Admin Menu text', 'volkovatheme' ),
        'name_admin_bar'        => _x( 'Video', 'Add New on Toolbar', 'volkovatheme' ),
        'add_new'               => __( 'Add New', 'volkovatheme' ),
        'add_new_item'          => __( 'Add New Video', 'volkovatheme' ),
        'new_item'              => __( 'New Video', 'volkovatheme' ),
        'edit_item'             => __( 'Edit Video', 'volkovatheme' ),
        'view_item'             => __( 'View Video', 'volkovatheme' ),
        'all_items'             => __( 'All Videos', 'volkovatheme' ),
        'search_items'          => __( 'Search Videos', 'volkovatheme' ),
        'parent_item_colon'     => __( 'Parent Videos:', 'volkovatheme' ),
        'not_found'             => __( 'No videos found.', 'volkovatheme' ),
        'not_found_in_trash'    => __( 'No videos found in Trash.', 'volkovatheme' ),
    );

    $video_args = array(
        'labels'             => $video_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'videos' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'editor', 'thumbnail' ),
        'menu_icon'          => 'dashicons-video-alt3',
    );

    register_post_type( 'video', $video_args );

    // Certificates
    $certificate_labels = array(
        'name'                  => _x( 'Certificates', 'Post type general name', 'volkovatheme' ),
        'singular_name'         => _x( 'Certificate', 'Post type singular name', 'volkovatheme' ),
        'menu_name'             => _x( 'Certificates', 'Admin Menu text', 'volkovatheme' ),
        'name_admin_bar'        => _x( 'Certificate', 'Add New on Toolbar', 'volkovatheme' ),
        'add_new'               => __( 'Add New', 'volkovatheme' ),
        'add_new_item'          => __( 'Add New Certificate', 'volkovatheme' ),
        'new_item'              => __( 'New Certificate', 'volkovatheme' ),
        'edit_item'             => __( 'Edit Certificate', 'volkovatheme' ),
        'view_item'             => __( 'View Certificate', 'volkovatheme' ),
        'all_items'             => __( 'All Certificates', 'volkovatheme' ),
        'search_items'          => __( 'Search Certificates', 'volkovatheme' ),
        'parent_item_colon'     => __( 'Parent Certificates:', 'volkovatheme' ),
        'not_found'             => __( 'No certificates found.', 'volkovatheme' ),
        'not_found_in_trash'    => __( 'No certificates found in Trash.', 'volkovatheme' ),
    );

    $certificate_args = array(
        'labels'             => $certificate_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'certificates' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => null,
        'supports'           => array( 'title', 'thumbnail' ),
        'menu_icon'          => 'dashicons-awards',
    );

    register_post_type( 'certificate', $certificate_args );
}
add_action( 'init', 'volkova_theme_register_post_types' );
