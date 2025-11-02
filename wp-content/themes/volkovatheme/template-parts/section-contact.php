<?php
/**
 * Template part for displaying the contact section
 *
 * @package Volkova_Theme
 */
?>

<section id="contact" class="contact-section">
    <div class="container">
        <h2><?php esc_html_e( 'Contact Me', 'volkovatheme' ); ?></h2>

        <?php
        // Developer Note: For more advanced forms with features like conditional logic, file uploads,
        // and robust spam protection, consider using a dedicated forms plugin like Contact Form 7 or Gravity Forms.
        ?>

        <?php if ( isset( $_GET['form_submitted'] ) && 'true' === $_GET['form_submitted'] ) : ?>
            <div class="contact-form-success">
                <p><?php esc_html_e( 'Thank you for your message. I will get back to you shortly.', 'volkovatheme' ); ?></p>
            </div>
        <?php else : ?>
            <form id="contact-form" action="<?php echo esc_url( admin_url( 'admin-post.php' ) ); ?>" method="post">
                <div class="form-group">
                    <label for="contact-name"><?php esc_html_e( 'Name', 'volkovatheme' ); ?></label>
                    <input type="text" id="contact-name" name="contact_name" required>
                </div>
                <div class="form-group">
                    <label for="contact-email"><?php esc_html_e( 'Email', 'volkovatheme' ); ?></label>
                    <input type="email" id="contact-email" name="contact_email" required>
                </div>
                <div class="form-group">
                    <label for="contact-message"><?php esc_html_e( 'Message', 'volkovatheme' ); ?></label>
                    <textarea id="contact-message" name="contact_message" rows="5" required></textarea>
                </div>
                <?php wp_nonce_field( 'contact_form_nonce', 'contact_form_nonce' ); ?>
                <input type="hidden" name="action" value="volkova_theme_handle_contact_form">
                <button type="submit" name="contact_form_submit"><?php esc_html_e( 'Send Message', 'volkovatheme' ); ?></button>
            </form>
        <?php endif; ?>
    </div>
</section>
