<?php
/**
 * Template part for displaying the About Me section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="about" class="about-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $about_data['title'] ); ?></h2>
        <div class="about-grid">
            <div class="about-column">
                <?php foreach ( array_slice( $about_data['items'], 0, 2 ) as $item ) : ?>
                    <div class="about-item">
                        <h3 class="about-item-title"><?php echo esc_html( $item['title'] ); ?></h3>
                        <?php echo wp_kses_post( $item['content'] ); ?>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="about-column">
                <?php foreach ( array_slice( $about_data['items'], 2 ) as $item ) : ?>
                    <div class="about-item">
                        <h3 class="about-item-title"><?php echo esc_html( $item['title'] ); ?></h3>
                        <?php echo wp_kses_post( $item['content'] ); ?>
                    </div>
                <?php endforeach; ?>
                 <div class="about-item">
                    <h3 class="about-item-title">Сертификаты</h3>
                    <div class="certificates-gallery">
                        <!-- Placeholder for certificates -->
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cert-placeholder.jpg" alt="Сертификат об окончании курса по когнитивно-поведенческой терапии">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/cert-placeholder.jpg" alt="Сертификат о прохождении обучения по гештальт-терапии">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
