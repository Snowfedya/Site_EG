<?php
/**
 * Plugin Name: Psychologist Professional - Functionality
 * Plugin URI:  https://your-psychology-site.com
 * Description: Adds core functionality for the Psychologist Professional theme: Custom Post Types (Services, Testimonials, Videos, Audio, Q&A, Events), meta boxes, and form handlers.
 * Version:     1.1.0
 * Author:      Gemini AI & Psychologist Pro Team
 * Author URI:  https://your-psychology-site.com
 * License:     GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: psychologist-pro-plugin
 * Domain Path: /languages
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class PsychologistPro_Functionality {

    public function __construct() {
        add_action('init', [$this, 'register_post_types']);
        add_action('init', [$this, 'register_shortcodes']);
        add_action('init', [$this, 'add_vk_oembed_provider']);
        add_action('add_meta_boxes', [$this, 'add_meta_boxes']);
        add_action('save_post', [$this, 'save_meta_data']);
        add_action('wp_ajax_psychologist_pro_appointment', [$this, 'handle_appointment_form']);
        add_action('wp_ajax_nopriv_psychologist_pro_appointment', [$this, 'handle_appointment_form']);
        add_action('wp_ajax_psychologist_pro_ask_question', [$this, 'handle_ask_question_form']);
        add_action('wp_ajax_nopriv_psychologist_pro_ask_question', [$this, 'handle_ask_question_form']);
    }

    public function add_vk_oembed_provider() {
        wp_oembed_add_provider('#https?://(www\.)?vk\.com/video_ext\.php.*#i', 'https://vk.com/oembed.php', true);
        wp_oembed_add_provider('#https?://(www\.)?vk\.com/video.*#i', 'https://vk.com/oembed.php', true);
    }

    public function register_post_types() {
        // Existing CPTs (Services, Testimonials, Appointments, Video, Audio, Question)
        // ... (omitted for brevity, same as before)

        // АФИШИ (СОБЫТИЯ)
        register_post_type('event', [
            'labels' => [
                'name' => __('Афиши', 'psychologist-pro-plugin'),
                'singular_name' => __('Афиша', 'psychologist-pro-plugin'),
                'add_new' => __('Добавить афишу', 'psychologist-pro-plugin'),
                'all_items' => __('Все афиши', 'psychologist-pro-plugin'),
            ],
            'public' => true,
            'has_archive' => true,
            'menu_icon' => 'dashicons-megaphone',
            'supports' => ['title', 'editor', 'thumbnail', 'excerpt'],
            'show_in_rest' => true,
            'rewrite' => ['slug' => 'events'],
        ]);
    }

    public function register_shortcodes() {
        add_shortcode('ask_psychologist_form', [$this, 'render_ask_question_form']);
    }

    public function add_meta_boxes() {
        add_meta_box('service_details', __('Детали услуги', 'psychologist-pro-plugin'), [$this, 'render_service_meta_box'], 'services');
        add_meta_box('testimonial_details', __('Данные клиента', 'psychologist-pro-plugin'), [$this, 'render_testimonial_meta_box'], 'testimonials');
        add_meta_box('audio_details', __('Детали аудио', 'psychologist-pro-plugin'), [$this, 'render_audio_meta_box'], 'audio');
        add_meta_box('question_details', __('Детали вопроса', 'psychologist-pro-plugin'), [$this, 'render_question_meta_box'], 'question');
        add_meta_box('event_details', __('Детали события', 'psychologist-pro-plugin'), [$this, 'render_event_meta_box'], 'event');
    }

    // Meta Box Renderers (service, testimonial, audio, question are same as before)
    // ...

    public function render_event_meta_box($post) {
        wp_nonce_field('psychologist_pro_save_meta', 'psychologist_pro_meta_nonce');
        $date = get_post_meta($post->ID, '_event_date', true);
        $time = get_post_meta($post->ID, '_event_time', true);
        $location = get_post_meta($post->ID, '_event_location', true);
        $price = get_post_meta($post->ID, '_event_price', true);
        $url = get_post_meta($post->ID, '_event_registration_url', true);

        echo '<p><label>'.__('Дата', 'psychologist-pro-plugin').'</label><br/><input type="date" name="event_date" value="'.esc_attr($date).'" /></p>';
        echo '<p><label>'.__('Время', 'psychologist-pro-plugin').'</label><br/><input type="text" name="event_time" value="'.esc_attr($time).'" placeholder="'.__('Например, 19:00', 'psychologist-pro-plugin').'" /></p>';
        echo '<p><label>'.__('Место', 'psychologist-pro-plugin').'</label><br/><input type="text" name="event_location" value="'.esc_attr($location).'" placeholder="'.__('Например, г. Москва или Онлайн', 'psychologist-pro-plugin').'" /></p>';
        echo '<p><label>'.__('Стоимость', 'psychologist-pro-plugin').'</label><br/><input type="text" name="event_price" value="'.esc_attr($price).'" placeholder="'.__('Например, 1500 руб. или Бесплатно', 'psychologist-pro-plugin').'" /></p>';
        echo '<p><label>'.__('URL для регистрации', 'psychologist-pro-plugin').'</label><br/><input type="url" name="event_registration_url" value="'.esc_url($url).'" style="width: 98%;" /></p>';
    }

    public function save_meta_data($post_id) {
        if (!isset($_POST['psychologist_pro_meta_nonce']) || !wp_verify_nonce($_POST['psychologist_pro_meta_nonce'], 'psychologist_pro_save_meta')) {
            return;
        }
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
        if (!current_user_can('edit_post', $post_id)) return;

        $fields = [
            'service_price', 'service_duration',
            'client_name', 'client_age', 'rating',
            'audio_url',
            'asker_name', 'asker_email',
            'event_date', 'event_time', 'event_location', 'event_price', 'event_registration_url'
        ];

        foreach ($fields as $field) {
            if (isset($_POST[$field])) {
                update_post_meta($post_id, '_' . $field, sanitize_text_field($_POST[$field]));
            }
        }
    }

    // AJAX Handlers and Form Renderers (same as before)
    // ...
}

new PsychologistPro_Functionality();
