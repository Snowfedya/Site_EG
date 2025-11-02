<?php
/**
 * Вспомогательные функции шаблонов
 * 
 * @package Psychologist Professional
 */

/**
 * Подсчет времени чтения статьи
 */
function psychologist_pro_reading_time($content = '') {
    if (empty($content)) {
        $content = get_the_content();
    }

    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // 200 слов в минуту

    return max(1, $reading_time);
}

/**
 * Meta box functions are now in the psychologist-functionality-plugin.
 */

/**
 * Получить иконку звезды для рейтинга
 */
function psychologist_pro_get_star_rating($rating) {
    $output = '';
    for ($i = 1; $i <= 5; $i++) {
        if ($i <= $rating) {
            $output .= '<span class="star filled">★</span>';
        } else {
            $output .= '<span class="star">☆</span>';
        }
    }
    return $output;
}

/**
 * Подключаем файлы функций
 */
require get_template_directory() . '/inc/customizer.php';
