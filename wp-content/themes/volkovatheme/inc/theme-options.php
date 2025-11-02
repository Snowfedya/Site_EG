<?php
/**
 * Theme Options Page
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Add theme options page.
 */
function volkova_theme_add_options_page() {
    add_theme_page(
        __( 'Theme Options', 'volkovatheme' ),
        __( 'Theme Options', 'volkovatheme' ),
        'edit_theme_options',
        'volkova_theme_options',
        'volkova_theme_options_page_html'
    );
}
add_action( 'admin_menu', 'volkova_theme_add_options_page' );

/**
 * Register theme settings.
 */
function volkova_theme_register_settings() {
    register_setting( 'volkova_theme_options', 'volkova_theme_contact_email', 'sanitize_email' );
    register_setting( 'volkova_theme_options', 'volkova_theme_phone_number', 'sanitize_text_field' );
    register_setting( 'volkova_theme_options', 'volkova_theme_footer_text', 'sanitize_text_field' );
}
add_action( 'admin_init', 'volkova_theme_register_settings' );

/**
 * Theme options page HTML.
 */
function volkova_theme_options_page_html() {
    if ( ! current_user_can( 'edit_theme_options' ) ) {
        return;
    }
    ?>
    <div class="wrap">
        <h1><?php echo esc_html( get_admin_page_title() ); ?></h1>
        <form action="options.php" method="post">
            <?php
            settings_fields( 'volkova_theme_options' );
            do_settings_sections( 'volkova_theme_options' );
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row"><?php esc_html_e( 'Contact Email', 'volkovatheme' ); ?></th>
                    <td>
                        <input type="email" name="volkova_theme_contact_email" value="<?php echo esc_attr( get_option( 'volkova_theme_contact_email' ) ); ?>" class="regular-text" />
                        <p class="description"><?php esc_html_e( 'Email address for the contact form.', 'volkovatheme' ); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e( 'Phone Number', 'volkovatheme' ); ?></th>
                    <td>
                        <input type="text" name="volkova_theme_phone_number" value="<?php echo esc_attr( get_option( 'volkova_theme_phone_number' ) ); ?>" class="regular-text" />
                        <p class="description"><?php esc_html_e( 'Phone number displayed in the header/footer.', 'volkovatheme' ); ?></p>
                    </td>
                </tr>
                <tr valign="top">
                    <th scope="row"><?php esc_html_e( 'Footer Text', 'volkovatheme' ); ?></th>
                    <td>
                        <input type="text" name="volkova_theme_footer_text" value="<?php echo esc_attr( get_option( 'volkova_theme_footer_text' ) ); ?>" class="regular-text" />
                        <p class="description"><?php esc_html_e( 'Text to be displayed in the footer.', 'volkovatheme' ); ?></p>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>
    </div>
    <?php
}
