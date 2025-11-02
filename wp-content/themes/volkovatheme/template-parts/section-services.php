<?php
/**
 * Template part for displaying the Services section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="services" class="services-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $services_data['title'] ); ?></h2>
        <div class="services-grid">

            <?php foreach ( $services_data['services'] as $service ) : ?>
                <div class="service-card">
                    <div class="service-card-icon">
                        <!-- Placeholder for icon -->
                    </div>
                    <h3 class="service-card-title"><?php echo esc_html( $service['title'] ); ?></h3>
                    <p class="service-card-description"><?php echo esc_html( $service['description'] ); ?></p>
                    <div class="service-card-meta">
                        <span>Длительность: <?php echo esc_html( $service['duration'] ); ?></span>
                        <span>Цена: <?php echo esc_html( $service['price'] ); ?></span>
                    </div>
                    <a href="https://calendly.com/your_username" class="button button-primary" target="_blank" rel="noopener noreferrer">Записаться</a>
                </div>
            <?php endforeach; ?>

        </div>
    </div>
</section>
