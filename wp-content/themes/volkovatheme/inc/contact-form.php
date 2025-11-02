<?php
/**
 * Contact Form
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Handle contact form submission.
 */
function volkova_theme_handle_contact_form() {
    if ( isset( $_POST['contact_form_submit'] ) ) {
        // Verify nonce
        if ( ! isset( $_POST['contact_form_nonce'] ) || ! wp_verify_nonce( $_POST['contact_form_nonce'], 'contact_form_nonce' ) ) {
            return;
        }

        // Sanitize form data
        $name    = sanitize_text_field( $_POST['contact_name'] );
        $email   = sanitize_email( $_POST['contact_email'] );
        $message = sanitize_textarea_field( $_POST['contact_message'] );

        // Validate form data
        if ( empty( $name ) || empty( $email ) || empty( $message ) ) {
            return;
        }

        // Send email
        $to      = get_option( 'volkova_theme_contact_email', get_option( 'admin_email' ) );
        $subject = sprintf( esc_html__( 'New message from %s', 'volkovatheme' ), $name );
        $body    = sprintf(
            esc_html__( "Name: %s\nEmail: %s\nMessage: %s", 'volkovatheme' ),
            $name,
            $email,
            $message
        );
        $headers = array( 'Content-Type: text/plain; charset=UTF-8' );

        wp_mail( $to, $subject, $body, $headers );

        // Redirect after submission
        wp_safe_redirect( add_query_arg( 'form_submitted', 'true', wp_get_referer() ) );
        exit;
    }
}
add_action( 'admin_post_nopriv_volkova_theme_handle_contact_form', 'volkova_theme_handle_contact_form' );
add_action( 'admin_post_volkova_theme_handle_contact_form', 'volkova_theme_handle_contact_form' );
