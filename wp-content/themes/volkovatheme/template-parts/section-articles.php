<?php
/**
 * Template part for displaying the Articles (Blog) section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="articles" class="articles-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $articles_data['title'] ); ?></h2>
        <div class="article-filters">
            <button class="filter-button active" data-filter="all">Все статьи</button>
            <button class="filter-button" data-filter="relationships">Психология отношений</button>
            <button class="filter-button" data-filter="emotions">Работа с эмоциями</button>
            <button class="filter-button" data-filter="development">Развитие личности</button>
            <button class="filter-button" data-filter="family">Семейная психология</button>
        </div>
        <div class="articles-grid">
            <?php foreach ( $articles_data['articles'] as $article ) : ?>
                <div class="article-card" data-category="relationships">
                    <div class="article-thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/article-placeholder.jpg" alt="<?php echo esc_attr( $article['title'] ); ?>">
                    </div>
                    <div class="article-content">
                        <span class="article-category"><?php echo esc_html( $article['category'] ); ?></span>
                        <h3 class="article-title"><?php echo esc_html( $article['title'] ); ?></h3>
                        <p class="article-excerpt"><?php echo esc_html( $article['excerpt'] ); ?></p>
                        <div class="article-meta">
                            <span class="article-date"><?php echo esc_html( $article['date'] ); ?></span>
                            <span class="article-read-time"><?php echo esc_html( $article['read_time'] ); ?></span>
                        </div>
                        <a href="#" class="button button-text">Читать далее</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="articles-footer">
            <button class="button button-outline">Показать ещё</button>
        </div>
    </div>
</section>
