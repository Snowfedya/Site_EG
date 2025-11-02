<?php
/**
 * Template part for displaying the Contact section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="contact" class="contact-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $contact_data['title'] ); ?></h2>
        <div class="contact-grid">
            <div class="contact-info">
                <h3 class="contact-subtitle">Контактные данные</h3>
                <ul>
                    <li><i class="icon-phone"></i> <span><?php echo esc_html( $contact_data['phone'] ); ?></span></li>
                    <li><i class="icon-email"></i> <span><?php echo esc_html( $contact_data['email'] ); ?></span></li>
                    <li><i class="icon-location"></i> <span><?php echo esc_html( $contact_data['address'] ); ?></span></li>
                </ul>
                <h3 class="contact-subtitle">Я в соцсетях</h3>
                <div class="social-links-contact">
                    <!-- Placeholder for social links -->
                    <a href="#">VK</a>, <a href="#">Telegram</a>, <a href="#">Instagram</a>
                </div>
            </div>
            <div class="contact-form-wrapper">
                <h3 class="contact-subtitle">Написать мне</h3>
                <?php
                /*
                 * DEVELOPER NOTE:
                 * The form below is a static HTML placeholder for styling purposes.
                 * To make it functional, please install a forms plugin (e.g., Contact Form 7).
                 * Once the plugin is active, replace the entire <form>...</form> block below
                 * with the shortcode provided by the plugin.
                 *
                 * Example: echo do_shortcode( '[contact-form-7 id="your-id" title="Contact form 1"]' );
                 */
                ?>
                <div class="form-placeholder">
                    <form class="contact-form" action="https://formspree.io/f/your_form_id" method="POST">
                        <div class="form-group">
                            <label for="name">Ваше имя <span class="required">*</span></label>
                            <input type="text" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email <span class="required">*</span></label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Телефон</label>
                            <input type="tel" id="phone" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="message">Сообщение <span class="required">*</span></label>
                            <textarea id="message" name="message" rows="5" required></textarea>
                        </div>
                        <div class="form-group checkbox-group">
                            <input type="checkbox" id="consent" name="consent" required>
                            <label for="consent">Я даю согласие на обработку персональных данных</label>
                        </div>
                        <button type="submit" class="button button-primary">Отправить</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
