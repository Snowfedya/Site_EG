<?php
/**
 * Placeholder data for Volkova Theme
 *
 * This file contains all the site's dynamic text content in PHP arrays.
 * This simulates how a Headless CMS would feed data into the theme.
 *
 * @package Volkova_Theme
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

// Hero Section
$hero_data = array(
    'title' => 'Елена Георгиевна Волкова',
    'subtitle' => 'Психолог, психотравматолог',
    'description' => 'Более 10 лет помогаю людям найти внутреннюю гармонию, справиться с трудностями и улучшить качество жизни, используя проверенные методики.',
    'photo_alt' => 'Елена Георгиевна Волкова',
);

// About Section
$about_data = array(
    'title' => 'Обо мне',
    'items' => array(
        array(
            'title' => 'Моя миссия',
            'content' => 'Помочь вам обрести внутреннюю опору, научиться справляться с жизненными вызовами и построить гармоничные отношения с собой и окружающими.',
        ),
        array(
            'title' => 'Образование',
            'content' => '<ul><li>Московский Государственный Университет, Факультет психологии</li><li>Институт Психоанализа, Специализация по работе с травмой</li></ul>',
        ),
        array(
            'title' => 'Методы работы',
            'content' => '<ul><li>Когнитивно-поведенческая терапия (КПТ)</li><li>Гештальт-терапия</li><li>Арт-терапия</li></ul>',
        ),
    ),
);

// Services Section
$services_data = array(
    'title' => 'Услуги',
    'services' => array(
        array(
            'title' => 'Индивидуальные консультации',
            'description' => 'Конфиденциальная работа один на один для решения личных проблем.',
            'duration' => '50 минут',
            'price' => 'от 3000 руб',
        ),
        array(
            'title' => 'Семейная терапия',
            'description' => 'Помощь в разрешении конфликтов и восстановлении гармонии в семье.',
            'duration' => '90 минут',
            'price' => 'от 5000 руб',
        ),
        array(
            'title' => 'Работа с травмами',
            'description' => 'Специализированная помощь в преодолении последствий травматических событий.',
            'duration' => '50 минут',
            'price' => 'от 3500 руб',
        ),
        array(
            'title' => 'Онлайн консультация',
            'description' => 'Удобный формат консультаций из любой точки мира через видеосвязь.',
            'duration' => '50 минут',
            'price' => 'от 3000 руб',
        ),
    ),
);

// Articles Section
$articles_data = array(
    'title' => 'Статьи',
    'articles' => array(
        array(
            'category' => 'Психология отношений',
            'title' => 'Пример заголовка статьи 1',
            'excerpt' => 'Краткое описание статьи в 2-3 строки, чтобы заинтересовать читателя...',
            'date' => '1 ноября 2025',
            'read_time' => '5 мин. чтения',
        ),
        array(
            'category' => 'Работа с эмоциями',
            'title' => 'Пример заголовка статьи 2',
            'excerpt' => 'Краткое описание статьи в 2-3 строки, чтобы заинтересовать читателя...',
            'date' => '2 ноября 2025',
            'read_time' => '7 мин. чтения',
        ),
        array(
            'category' => 'Развитие личности',
            'title' => 'Пример заголовка статьи 3',
            'excerpt' => 'Краткое описание статьи в 2-3 строки, чтобы заинтересовать читателя...',
            'date' => '3 ноября 2025',
            'read_time' => '6 мин. чтения',
        ),
    ),
);

// Videos Section
$videos_data = array(
    'title' => 'Видеолекции',
    'main_video' => array(
        'url' => 'https://www.youtube.com/embed/dQw4w9WgXcQ',
        'title' => 'Название основного видео',
        'date' => '1 ноября 2025',
        'views' => '10,321 просмотров',
    ),
    'playlist' => array(
        array(
            'title' => 'Название видео 1',
            'views' => '1000 просмотров',
            'duration' => '10:45',
        ),
        array(
            'title' => 'Название видео 2',
            'views' => '2000 просмотров',
            'duration' => '12:30',
        ),
        array(
            'title' => 'Название видео 3',
            'views' => '3000 просмотров',
            'duration' => '08:15',
        ),
        array(
            'title' => 'Название видео 4',
            'views' => '4000 просмотров',
            'duration' => '15:00',
        ),
    ),
);

// Contact Section
$contact_data = array(
    'title' => 'Свяжитесь со мной',
    'phone' => '+7 (999) 123-45-67',
    'email' => 'elena.volkova@psychology.com',
    'address' => 'г. Москва, ул. Арбат, д. 1 (онлайн прием)',
);

?>
