<?php
/**
 * Custom Fields
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add meta boxes.
 */
function volkova_theme_add_meta_boxes() {
    add_meta_box(
        'volkova_video_url',
        __( 'Video URL', 'volkovatheme' ),
        'volkova_theme_video_url_callback',
        'video',
        'normal',
        'high'
    );

    add_meta_box(
        'volkova_service_details',
        __( 'Service Details', 'volkovatheme' ),
        'volkova_theme_service_details_callback',
        'service',
        'normal',
        'high'
    );
}
add_action( 'add_meta_boxes', 'volkova_theme_add_meta_boxes' );

/**
 * Video URL meta box callback.
 */
function volkova_theme_video_url_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'volkova_save_video_url', 'volkova_video_url_nonce' );

    $value = get_post_meta( $post->ID, '_video_url', true );

    echo '<label for="volkova_video_url_field">' . esc_html__( 'Enter the video URL:', 'volkovatheme' ) . '</label>';
    echo '<input type="url" id="volkova_video_url_field" name="volkova_video_url_field" value="' . esc_url( $value ) . '" size="25" />';
}

/**
 * Service Details meta box callback.
 */
function volkova_theme_service_details_callback( $post ) {
    // Add a nonce field so we can check for it later.
    wp_nonce_field( 'volkova_save_service_details', 'volkova_service_details_nonce' );

    $price = get_post_meta( $post->ID, '_service_price', true );
    $duration = get_post_meta( $post->ID, '_service_duration', true );

    echo '<p>';
    echo '<label for="volkova_service_price_field">' . esc_html__( 'Price:', 'volkovatheme' ) . '</label>';
    echo '<input type="text" id="volkova_service_price_field" name="volkova_service_price_field" value="' . esc_attr( $price ) . '" size="25" />';
    echo '</p>';

    echo '<p>';
    echo '<label for="volkova_service_duration_field">' . esc_html__( 'Duration:', 'volkovatheme' ) . '</label>';
    echo '<input type="text" id="volkova_service_duration_field" name="volkova_service_duration_field" value="' . esc_attr( $duration ) . '" size="25" />';
    echo '</p>';
}

/**
 * Save meta box content.
 */
function volkova_theme_save_meta_data( $post_id ) {
    // Check if our nonce is set.
    if ( ! isset( $_POST['volkova_video_url_nonce'] ) && ! isset( $_POST['volkova_service_details_nonce'] ) ) {
        return;
    }

    // Verify that the nonce is valid.
    if ( ( isset( $_POST['volkova_video_url_nonce'] ) && ! wp_verify_nonce( $_POST['volkova_video_url_nonce'], 'volkova_save_video_url' ) ) ||
         ( isset( $_POST['volkova_service_details_nonce'] ) && ! wp_verify_nonce( $_POST['volkova_service_details_nonce'], 'volkova_save_service_details' ) ) ) {
        return;
    }

    // If this is an autosave, our form has not been submitted, so we don't want to do anything.
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }

    // Check the user's permissions.
    if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {
        if ( ! current_user_can( 'edit_page', $post_id ) ) {
            return;
        }
    } else {
        if ( ! current_user_can( 'edit_post', $post_id ) ) {
            return;
        }
    }

    // Make sure that fields are set.
    if ( isset( $_POST['volkova_video_url_field'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['volkova_video_url_field'] );

        // Update the meta field in the database.
        update_post_meta( $post_id, '_video_url', $my_data );
    }

    if ( isset( $_POST['volkova_service_price_field'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['volkova_service_price_field'] );

        // Update the meta field in the database.
        update_post_meta( $post_id, '_service_price', $my_data );
    }

    if ( isset( $_POST['volkova_service_duration_field'] ) ) {
        // Sanitize user input.
        $my_data = sanitize_text_field( $_POST['volkova_service_duration_field'] );

        // Update the meta field in the database.
        update_post_meta( $post_id, '_service_duration', $my_data );
    }
}
add_action( 'save_post', 'volkova_theme_save_meta_data' );
