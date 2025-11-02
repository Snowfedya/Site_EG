<?php
/**
 * Настройки кастомайзера темы
 * 
 * @package Psychologist Professional
 */

function psychologist_pro_customize_register($wp_customize) {

    // Hero секция
    $wp_customize->add_section('hero_section', array(
        'title' => __('Главный экран', 'psychologist-pro'),
        'priority' => 30,
    ));

    $wp_customize->add_setting('hero_title', array(
        'default' => __('Профессиональная психологическая помощь', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('hero_title', array(
        'label' => __('Заголовок', 'psychologist-pro'),
        'section' => 'hero_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('hero_subtitle', array(
        'default' => __('Помогаю людям найти внутреннюю гармонию и справиться с жизненными трудностями', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('hero_subtitle', array(
        'label' => __('Подзаголовок', 'psychologist-pro'),
        'section' => 'hero_section',
        'type' => 'textarea',
    ));

    $wp_customize->add_setting('hero_image');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_image', array(
        'label' => __('Фото психолога', 'psychologist-pro'),
        'section' => 'hero_section',
    )));

    // О психологе
    $wp_customize->add_section('about_section', array(
        'title' => __('О психологе', 'psychologist-pro'),
        'priority' => 31,
    ));

    $wp_customize->add_setting('about_title', array(
        'default' => __('Обо мне', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_title', array(
        'label' => __('Заголовок секции', 'psychologist-pro'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_subtitle', array(
        'default' => __('Профессиональный психолог с многолетним опытом работы', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('about_subtitle', array(
        'label' => __('Подзаголовок', 'psychologist-pro'),
        'section' => 'about_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('about_content', array(
        'default' => __('Я практикующий психолог с более чем 10-летним опытом работы. Помогаю людям справляться с различными жизненными трудностями, находить внутренние ресурсы и строить более гармоничные отношения.', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_textarea_field',
    ));

    $wp_customize->add_control('about_content', array(
        'label' => __('Описание', 'psychologist-pro'),
        'section' => 'about_section',
        'type' => 'textarea',
    ));

    // Контакты
    $wp_customize->add_section('contact_section', array(
        'title' => __('Контакты', 'psychologist-pro'),
        'priority' => 32,
    ));

    $wp_customize->add_setting('contact_email', array(
        'default' => 'info@example.com',
        'sanitize_callback' => 'sanitize_email',
    ));

    $wp_customize->add_control('contact_email', array(
        'label' => __('Email', 'psychologist-pro'),
        'section' => 'contact_section',
        'type' => 'email',
    ));

    $wp_customize->add_setting('contact_phone', array(
        'default' => '+7 (495) 123-45-67',
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_phone', array(
        'label' => __('Телефон', 'psychologist-pro'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    $wp_customize->add_setting('contact_address', array(
        'default' => __('Москва', 'psychologist-pro'),
        'sanitize_callback' => 'sanitize_text_field',
    ));

    $wp_customize->add_control('contact_address', array(
        'label' => __('Адрес', 'psychologist-pro'),
        'section' => 'contact_section',
        'type' => 'text',
    ));

    // Цвета темы
    $wp_customize->add_section('colors_section', array(
        'title' => __('Цветовая схема', 'psychologist-pro'),
        'priority' => 33,
    ));

    $wp_customize->add_setting('primary_color', array(
        'default' => '#2c5aa0',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'primary_color', array(
        'label' => __('Основной цвет', 'psychologist-pro'),
        'section' => 'colors_section',
    )));

    $wp_customize->add_setting('accent_color', array(
        'default' => '#4a90e2',
        'sanitize_callback' => 'sanitize_hex_color',
    ));

    $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'accent_color', array(
        'label' => __('Акцентный цвет', 'psychologist-pro'),
        'section' => 'colors_section',
    )));
}
add_action('customize_register', 'psychologist_pro_customize_register');

/**
 * Вывод пользовательских CSS для кастомайзера
 */
function psychologist_pro_customize_css() {
    $primary_color = get_theme_mod('primary_color', '#2c5aa0');
    $accent_color = get_theme_mod('accent_color', '#4a90e2');
    ?>
    <style type="text/css">
        :root {
            --primary-color: <?php echo esc_html($primary_color); ?>;
            --accent-color: <?php echo esc_html($accent_color); ?>;
        }
    </style>
    <?php
}
add_action('wp_head', 'psychologist_pro_customize_css');
