<?php
/**
 * Psychologist Professional - Functions
 * 
 * @package Psychologist Professional
 * @version 1.0.0
 */

if (!defined('ABSPATH')) {
    exit; // Защита от прямого доступа
}

// Основные константы темы
define('PSYCHOLOGIST_PRO_VERSION', '1.0.0');
define('PSYCHOLOGIST_PRO_DIR', get_template_directory());
define('PSYCHOLOGIST_PRO_URL', get_template_directory_uri());

/**
 * Настройка темы
 */
function psychologist_pro_setup() {
    // Поддержка заголовков документа
    add_theme_support('title-tag');

    // Поддержка миниатюр записей
    add_theme_support('post-thumbnails');

    // HTML5 поддержка
    add_theme_support('html5', array(
        'search-form',
        'comment-form', 
        'comment-list',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // Поддержка пользовательского логотипа
    add_theme_support('custom-logo', array(
        'height' => 100,
        'width' => 300,
        'flex-height' => true,
        'flex-width' => true,
    ));

    // Регистрация меню
    register_nav_menus(array(
        'primary' => __('Основное меню', 'psychologist-pro'),
        'footer'  => __('Меню в подвале', 'psychologist-pro'),
    ));

    // Поддержка пользовательского фона
    add_theme_support('custom-background');

    // Размеры изображений
    add_image_size('hero-image', 800, 600, true);
    add_image_size('service-thumb', 400, 300, true);
    add_image_size('team-member', 300, 300, true);
    add_image_size('testimonial-thumb', 150, 150, true);

    // Поддержка RSS ссылок
    add_theme_support('automatic-feed-links');

    // Локализация
    load_theme_textdomain('psychologist-pro', PSYCHOLOGIST_PRO_DIR . '/languages');
}
add_action('after_setup_theme', 'psychologist_pro_setup');

/**
 * Подключение стилей и скриптов
 */
function psychologist_pro_enqueue_scripts() {
    // Google Fonts
    wp_enqueue_style(
        'psychologist-pro-fonts',
        'https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Playfair+Display:wght@400;500;600;700&display=swap',
        array(),
        null
    );

    // Основные стили
    wp_enqueue_style(
        'psychologist-pro-style',
        PSYCHOLOGIST_PRO_URL . '/assets/css/style.css',
        array(),
        PSYCHOLOGIST_PRO_VERSION
    );

    // Главный скрипт
    wp_enqueue_script(
        'psychologist-pro-script',
        PSYCHOLOGIST_PRO_URL . '/assets/js/main.js',
        array('jquery'),
        PSYCHOLOGIST_PRO_VERSION,
        true
    );

    // Локализация для AJAX
    wp_localize_script('psychologist-pro-script', 'psychologist_pro_ajax', array(
        'ajax_url' => admin_url('admin-ajax.php'),
        'nonce' => wp_create_nonce('psychologist_pro_nonce'),
        'loading' => __('Загрузка...', 'psychologist-pro'),
        'error' => __('Произошла ошибка. Попробуйте снова.', 'psychologist-pro'),
    ));

    // Комментарии
    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'psychologist_pro_enqueue_scripts');

/**
 * All custom post types and AJAX handlers are now in the psychologist-functionality-plugin.
 */

/**
 * Области виджетов
 */
function psychologist_pro_widgets_init() {
    register_sidebar(array(
        'name' => __('Основной сайдбар', 'psychologist-pro'),
        'id' => 'sidebar-1',
        'description' => __('Основная область виджетов', 'psychologist-pro'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - Колонка 1', 'psychologist-pro'),
        'id' => 'footer-1',
        'description' => __('Первая колонка в подвале сайта', 'psychologist-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - Колонка 2', 'psychologist-pro'),
        'id' => 'footer-2',
        'description' => __('Вторая колонка в подвале сайта', 'psychologist-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));

    register_sidebar(array(
        'name' => __('Подвал - Колонка 3', 'psychologist-pro'),
        'id' => 'footer-3',
        'description' => __('Третья колонка в подвале сайта', 'psychologist-pro'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget' => '</div>',
        'before_title' => '<h4 class="widget-title">',
        'after_title' => '</h4>',
    ));
}
add_action('widgets_init', 'psychologist_pro_widgets_init');

// Подключаем дополнительные функции
require_once get_template_directory() . '/inc/template-functions.php';
