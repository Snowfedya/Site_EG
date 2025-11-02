    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <?php if (is_active_sidebar('footer-1') || is_active_sidebar('footer-2') || is_active_sidebar('footer-3')) : ?>
            <div class="footer-widgets">
                <div class="container">
                    <div class="footer-widgets-grid">
                        <?php if (is_active_sidebar('footer-1')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-1'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-2')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-2'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if (is_active_sidebar('footer-3')) : ?>
                            <div class="footer-widget-area">
                                <?php dynamic_sidebar('footer-3'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <div class="site-info">
            <div class="container">
                <div class="footer-bottom">
                    <div class="copyright">
                        <p>&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>. <?php _e('Все права защищены.', 'psychologist-pro'); ?></p>
                    </div>

                    <div class="footer-menu">
                        <?php
                        wp_nav_menu(array(
                            'theme_location' => 'footer',
                            'menu_class' => 'footer-nav',
                            'container' => false,
                            'depth' => 1,
                            'fallback_cb' => false,
                        ));
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Модальное окно записи на консультацию -->
    <div id="appointment-modal" class="modal appointment-modal">
        <div class="modal-content">
            <div class="modal-header">
                <h3><?php _e('Записаться на консультацию', 'psychologist-pro'); ?></h3>
                <button class="modal-close" aria-label="<?php _e('Закрыть', 'psychologist-pro'); ?>">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form id="appointment-form" class="appointment-form">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointment-name"><?php _e('Ваше имя', 'psychologist-pro'); ?> <span class="required">*</span></label>
                            <input type="text" id="appointment-name" name="name" required>
                        </div>

                        <div class="form-group">
                            <label for="appointment-email"><?php _e('Email', 'psychologist-pro'); ?> <span class="required">*</span></label>
                            <input type="email" id="appointment-email" name="email" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointment-phone"><?php _e('Телефон', 'psychologist-pro'); ?> <span class="required">*</span></label>
                            <input type="tel" id="appointment-phone" name="phone" required>
                        </div>

                        <div class="form-group">
                            <label for="appointment-service"><?php _e('Тип консультации', 'psychologist-pro'); ?></label>
                            <select id="appointment-service" name="service">
                                <option value=""><?php _e('Выберите услугу', 'psychologist-pro'); ?></option>
                                <?php
                                $services = get_posts(array(
                                    'post_type' => 'services',
                                    'numberposts' => -1,
                                    'post_status' => 'publish'
                                ));
                                foreach ($services as $service) :
                                ?>
                                    <option value="<?php echo esc_attr($service->post_title); ?>"><?php echo esc_html($service->post_title); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="appointment-date"><?php _e('Предпочитаемая дата', 'psychologist-pro'); ?></label>
                            <input type="date" id="appointment-date" name="date" min="<?php echo date('Y-m-d'); ?>">
                        </div>

                        <div class="form-group">
                            <label for="appointment-time"><?php _e('Предпочитаемое время', 'psychologist-pro'); ?></label>
                            <select id="appointment-time" name="time">
                                <option value=""><?php _e('Выберите время', 'psychologist-pro'); ?></option>
                                <option value="09:00">09:00</option>
                                <option value="10:00">10:00</option>
                                <option value="11:00">11:00</option>
                                <option value="12:00">12:00</option>
                                <option value="14:00">14:00</option>
                                <option value="15:00">15:00</option>
                                <option value="16:00">16:00</option>
                                <option value="17:00">17:00</option>
                                <option value="18:00">18:00</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="appointment-message"><?php _e('Дополнительная информация', 'psychologist-pro'); ?></label>
                        <textarea id="appointment-message" name="message" rows="4" placeholder="<?php _e('Расскажите о проблеме или вопросах, с которыми хотели бы поработать...', 'psychologist-pro'); ?>"></textarea>
                    </div>

                    <div class="gdpr-consent">
                        <label class="checkbox-label">
                            <input type="checkbox" id="gdpr-consent" name="gdpr_consent" required>
                            <span class="checkmark"></span>
                            <?php _e('Я согласен на обработку персональных данных в соответствии с', 'psychologist-pro'); ?> 
                            <a href="<?php echo get_privacy_policy_url(); ?>" target="_blank"><?php _e('политикой конфиденциальности', 'psychologist-pro'); ?></a>
                        </label>
                    </div>

                    <div class="form-submit">
                        <button type="submit" class="btn btn-primary btn-large">
                            <span class="btn-text"><?php _e('Отправить заявку', 'psychologist-pro'); ?></span>
                            <span class="btn-loading"><?php _e('Отправка...', 'psychologist-pro'); ?></span>
                        </button>
                    </div>

                    <input type="hidden" name="action" value="psychologist_pro_appointment">
                    <input type="hidden" name="nonce" value="<?php echo wp_create_nonce('psychologist_pro_nonce'); ?>">
                </form>
            </div>
        </div>
    </div>

    <!-- Уведомления -->
    <div id="notifications" class="notifications-container"></div>

    <!-- Кнопка "Наверх" -->
    <button id="back-to-top" class="back-to-top" aria-label="<?php _e('Наверх', 'psychologist-pro'); ?>">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M12 19V5M5 12L12 5L19 12" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
    </button>

</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>
