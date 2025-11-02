<?php
/**
 * Шаблон страницы поиска
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                printf(__('Результаты поиска: %s', 'psychologist-pro'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
            <?php if (have_posts()) : ?>
                <p class="archive-description">
                    <?php printf(__('Найдено материалов: %d', 'psychologist-pro'), $wp_query->found_posts); ?>
                </p>
            <?php endif; ?>
        </header>

        <!-- Форма поиска -->
        <div class="search-form-container">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <div class="search-field-wrapper">
                    <input type="search" 
                           class="search-field" 
                           placeholder="<?php _e('Что вас интересует?', 'psychologist-pro'); ?>" 
                           value="<?php echo get_search_query(); ?>" 
                           name="s" />
                    <button type="submit" class="search-submit btn btn-primary">
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11" cy="11" r="8" stroke="currentColor" stroke-width="2"/>
                            <path d="m21 21-4.35-4.35" stroke="currentColor" stroke-width="2"/>
                        </svg>
                        <span class="sr-only"><?php _e('Поиск', 'psychologist-pro'); ?></span>
                    </button>
                </div>
            </form>
        </div>

        <?php if (have_posts()) : ?>
            <div class="search-results">
                <?php while (have_posts()) : the_post(); ?>
                    <article class="search-result-item">
                        <header class="result-header">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="result-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('thumbnail'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="result-content">
                                <div class="result-meta">
                                    <span class="post-type">
                                        <?php 
                                        $post_type_obj = get_post_type_object(get_post_type());
                                        echo $post_type_obj ? $post_type_obj->labels->singular_name : '';
                                        ?>
                                    </span>
                                    <time class="post-date"><?php echo get_the_date(); ?></time>
                                </div>

                                <h2 class="result-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <div class="result-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php 
                                    if (get_post_type() === 'services') {
                                        _e('Подробнее об услуге', 'psychologist-pro');
                                    } else {
                                        _e('Читать далее', 'psychologist-pro');
                                    }
                                    ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </header>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php
                the_posts_pagination(array(
                    'mid_size' => 2,
                    'prev_text' => __('← Предыдущие', 'psychologist-pro'),
                    'next_text' => __('Следующие →', 'psychologist-pro'),
                ));
                ?>
            </div>

        <?php else : ?>
            <div class="no-results">
                <h2><?php _e('Ничего не найдено', 'psychologist-pro'); ?></h2>
                <p><?php _e('По вашему запросу ничего не найдено. Попробуйте изменить ключевые слова.', 'psychologist-pro'); ?></p>

                <div class="search-suggestions">
                    <h3><?php _e('Попробуйте поискать:', 'psychologist-pro'); ?></h3>
                    <ul class="suggestion-list">
                        <li><a href="<?php echo get_post_type_archive_link('services'); ?>"><?php _e('Услуги психолога', 'psychologist-pro'); ?></a></li>
                        <li><a href="<?php echo get_post_type_archive_link('testimonials'); ?>"><?php _e('Отзывы клиентов', 'psychologist-pro'); ?></a></li>
                        <li><a href="<?php echo get_permalink(get_option('page_for_posts')); ?>"><?php _e('Статьи блога', 'psychologist-pro'); ?></a></li>
                    </ul>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
