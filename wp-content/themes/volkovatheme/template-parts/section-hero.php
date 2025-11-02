<?php
/**
 * Template part for displaying the hero section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="hero" class="hero-section">
    <div class="container">
        <div class="hero-content">
            <div class="hero-text">
                <h1 class="hero-title"><?php echo esc_html( $hero_data['title'] ); ?></h1>
                <p class="hero-subtitle"><?php echo esc_html( $hero_data['subtitle'] ); ?></p>
                <p class="hero-description"><?php echo esc_html( $hero_data['description'] ); ?></p>
                <div class="hero-buttons">
                    <a href="https://calendly.com/your_username" class="button button-primary" target="_blank" rel="noopener noreferrer">Записаться на консультацию</a>
                    <a href="/about" class="button button-outline">Узнать больше</a>
                </div>
                <div class="hero-trust-indicators">
                    <span><i class="icon-certified"></i> Сертифицирован</span>
                    <span><i class="icon-experience"></i> Опыт 10+ лет</span>
                </div>
            </div>
            <div class="hero-image">
                <!-- Placeholder for the psychologist's photo -->
                <img src="<?php echo get_template_directory_uri(); ?>/images/placeholder-photo.jpg" alt="<?php echo esc_attr( $hero_data['photo_alt'] ); ?>">
                 <div class="decorative-elements">
                    <!-- Placeholder for decorative elements -->
                </div>
            </div>
        </div>
    </div>
</section>
