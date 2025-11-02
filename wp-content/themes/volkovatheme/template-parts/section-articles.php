<?php
/**
 * Template part for displaying the Articles (Blog) section
 *
 * @package Volkova_Theme
 */
?>

<section id="articles" class="articles-section">
    <div class="container">
        <h2 class="section-title">Статьи</h2>
        <div class="article-filters">
            <button class="filter-button active" data-filter="all">Все статьи</button>
            <button class="filter-button" data-filter="relationships">Психология отношений</button>
            <button class="filter-button" data-filter="emotions">Работа с эмоциями</button>
            <button class="filter-button" data-filter="development">Развитие личности</button>
            <button class="filter-button" data-filter="family">Семейная психология</button>
        </div>
        <div class="articles-grid">
            <?php
            /*
             * DEVELOPER NOTE:
             * This is a placeholder loop. You should replace this with a standard WordPress query (WP_Query)
             * to display the latest posts from your blog.
             *
             * Example:
             *
             * $args = array( 'post_type' => 'post', 'posts_per_page' => 6 );
             * $the_query = new WP_Query( $args );
             * if ( $the_query->have_posts() ) :
             *     while ( $the_query->have_posts() ) : $the_query->the_post();
             *         // Include your article-card HTML here, using template tags like the_title(), the_excerpt(), etc.
             *     endwhile;
             *     wp_reset_postdata();
             * endif;
             *
             * The data-category attribute is used by the JS filter. Make sure your WordPress loop
             * outputs the correct category slug for each post.
             */
            for ( $i = 1; $i <= 3; $i++ ) : ?>
            <div class="article-card" data-category="relationships">
                <div class="article-thumbnail">
                    <img src="<?php echo get_template_directory_uri(); ?>/images/article-placeholder.jpg" alt="Заголовок статьи">
                </div>
                <div class="article-content">
                    <span class="article-category">Психология отношений</span>
                    <h3 class="article-title">Пример заголовка статьи <?php echo $i; ?></h3>
                    <p class="article-excerpt">Краткое описание статьи в 2-3 строки, чтобы заинтересовать читателя...</p>
                    <div class="article-meta">
                        <span class="article-date">1 ноября 2025</span>
                        <span class="article-read-time">5 мин. чтения</span>
                    </div>
                    <a href="#" class="button button-text">Читать далее</a>
                </div>
            </div>
            <?php endfor; ?>
        </div>
        <div class="articles-footer">
            <button class="button button-outline">Показать ещё</button>
        </div>
    </div>
</section>
