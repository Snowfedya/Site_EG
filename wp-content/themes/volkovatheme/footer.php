<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Volkova_Theme
 */
?>

</div><!-- #content -->

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-top">
            <div class="footer-widget">
                <h3 class="widget-title">О сайте</h3>
                <p>Более 10 лет помогаю людям найти внутреннюю гармонию, справиться с трудностями и улучшить качество жизни.</p>
            </div>
            <div class="footer-widget">
                <h3 class="widget-title">Быстрые ссылки</h3>
                <?php
                if ( has_nav_menu( 'primary' ) ) {
                    wp_nav_menu(
                        array(
                            'theme_location' => 'primary',
                            'menu_class'     => 'footer-menu',
                            'container'      => false,
                            'depth'          => 1,
                        )
                    );
                }
                ?>
            </div>
            <div class="footer-widget">
                <h3 class="widget-title">Информация</h3>
                <ul class="footer-info-menu">
                    <li><a href="#">Политика конфиденциальности</a></li>
                    <li><a href="#">Условия использования</a></li>
                </ul>
            </div>
        </div>
        <div class="footer-middle">
            <div class="social-icons">
                <!-- Placeholder for social media icons. Example: -->
                <a href="#" target="_blank" rel="noopener noreferrer">VK</a>
                <a href="#" target="_blank" rel="noopener noreferrer">Telegram</a>
                <a href="#" target="_blank" rel="noopener noreferrer">Instagram</a>
            </div>
        </div>
        <div class="footer-bottom">
            <p class="copyright">&copy; <?php echo esc_html( date( 'Y' ) ); ?> Елена Волкова. Все права защищены.</p>
            <p class="powered-by">Сайт работает на <a href="https://wordpress.org/" target="_blank" rel="noopener noreferrer">WordPress</a></p>
        </div>
    </div>
</footer><!-- #colophon -->

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

<!-- Modal for Appointment Booking -->
<div id="appointment-modal" class="modal-overlay">
    <div class="modal-content">
        <button class="close-modal" aria-label="Close modal">&times;</button>
        <h3 class="modal-title">Запишитесь на консультацию</h3>
        <form class="modal-form">
            <!-- This would be a shortcode for a booking/contact form plugin -->
            <div class="form-group">
                <label for="modal-name">Ваше имя <span class="required">*</span></label>
                <input type="text" id="modal-name" name="modal-name" required>
            </div>
            <div class="form-group">
                <label for="modal-email">Email <span class="required">*</span></label>
                <input type="email" id="modal-email" name="modal-email" required>
            </div>
             <div class="form-group">
                <label for="modal-phone">Телефон <span class="required">*</span></label>
                <input type="tel" id="modal-phone" name="modal-phone" required>
            </div>
            <div class="form-group">
                <label for="modal-service">Тип консультации</label>
                <select id="modal-service" name="modal-service">
                    <option>Индивидуальная</option>
                    <option>Семейная</option>
                    <option>Онлайн</option>
                </select>
            </div>
            <div class="form-group">
                <label for="modal-message">Расскажите о вашей ситуации</label>
                <textarea id="modal-message" name="modal-message" rows="4"></textarea>
            </div>
            <button type="submit" class="button button-primary">Отправить заявку</button>
        </form>
    </div>
</div>

<!-- Back to Top Button -->
<a href="#" class="back-to-top-button" aria-label="Scroll to top">↑</a>
