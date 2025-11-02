<?php
/**
 * Шаблон страницы 404
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <div class="error-404-content">
            <div class="error-404-visual">
                <div class="error-number">404</div>
                <div class="error-icon">
                    <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <line x1="12" y1="9" x2="12" y2="13" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                        <circle cx="12" cy="17" r="1" fill="currentColor"/>
                    </svg>
                </div>
            </div>

            <div class="error-404-text">
                <h1 class="error-title"><?php _e('Страница не найдена', 'psychologist-pro'); ?></h1>
                <p class="error-description">
                    <?php _e('К сожалению, запрашиваемая страница не существует или была удалена. Возможно, вы перешли по устаревшей ссылке или ошиблись в адресе.', 'psychologist-pro'); ?>
                </p>

                <!-- Поиск -->
                <div class="error-search">
                    <h3><?php _e('Попробуйте найти нужную информацию:', 'psychologist-pro'); ?></h3>
                    <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                        <div class="search-field-wrapper">
                            <input type="search" 
                                   class="search-field" 
                                   placeholder="<?php _e('Что вас интересует?', 'psychologist-pro'); ?>" 
                                   name="s" />
                            <button type="submit" class="search-submit btn btn-primary">
                                <?php _e('Поиск', 'psychologist-pro'); ?>
                            </button>
                        </div>
                    </form>
                </div>

                <!-- Быстрые ссылки -->
                <div class="error-navigation">
                    <h3><?php _e('Или перейдите в один из разделов:', 'psychologist-pro'); ?></h3>
                    <div class="quick-links">
                        <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                            <?php _e('Главная страница', 'psychologist-pro'); ?>
                        </a>
                        <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-outline">
                            <?php _e('Услуги', 'psychologist-pro'); ?>
                        </a>
                        <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline">
                            <?php _e('Блог', 'psychologist-pro'); ?>
                        </a>
                        <a href="#appointment-form" class="btn btn-outline">
                            <?php _e('Записаться на консультацию', 'psychologist-pro'); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Популярные записи -->
        <?php
        $popular_posts = get_posts(array(
            'numberposts' => 3,
            'meta_key' => 'views_count',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ));

        if (!$popular_posts) {
            $popular_posts = get_posts(array('numberposts' => 3));
        }

        if ($popular_posts) :
        ?>
            <div class="popular-content">
                <h2><?php _e('Популярные материалы', 'psychologist-pro'); ?></h2>
                <div class="popular-posts-grid">
                    <?php foreach ($popular_posts as $post) : setup_postdata($post); ?>
                        <article class="popular-post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-content">
                                <h3 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="post-excerpt"><?php echo wp_trim_words(get_the_excerpt(), 15); ?></p>
                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php _e('Читать', 'psychologist-pro'); ?>
                                </a>
                            </div>
                        </article>
                    <?php endforeach; wp_reset_postdata(); ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<style>
.error-404-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: var(--space-16);
    align-items: center;
    margin: var(--space-20) 0;
}

.error-404-visual {
    text-align: center;
    color: var(--primary-light);
}

.error-number {
    font-size: 8rem;
    font-weight: 700;
    font-family: var(--font-secondary);
    line-height: 1;
    opacity: 0.3;
    margin-bottom: var(--space-4);
}

.error-icon {
    opacity: 0.5;
}

.error-title {
    font-size: var(--text-4xl);
    color: var(--primary-color);
    margin-bottom: var(--space-6);
}

.error-description {
    font-size: var(--text-lg);
    color: var(--text-light);
    line-height: 1.6;
    margin-bottom: var(--space-8);
}

.error-search, .error-navigation {
    margin-bottom: var(--space-8);
}

.error-search h3, .error-navigation h3 {
    font-size: var(--text-xl);
    margin-bottom: var(--space-4);
}

.search-field-wrapper {
    display: flex;
    gap: var(--space-2);
    margin-bottom: var(--space-6);
}

.search-field {
    flex: 1;
    padding: var(--space-3) var(--space-4);
    border: 2px solid var(--border-color);
    border-radius: var(--radius-lg);
    font-size: var(--text-base);
}

.quick-links {
    display: flex;
    gap: var(--space-3);
    flex-wrap: wrap;
}

.popular-content {
    margin-top: var(--space-20);
    padding-top: var(--space-20);
    border-top: 1px solid var(--border-color);
}

.popular-posts-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: var(--space-6);
    margin-top: var(--space-8);
}

.popular-post-card {
    background: var(--white);
    border-radius: var(--radius-xl);
    box-shadow: var(--shadow-md);
    overflow: hidden;
    transition: var(--transition-normal);
}

.popular-post-card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-xl);
}

@media (max-width: 768px) {
    .error-404-content {
        grid-template-columns: 1fr;
        text-align: center;
    }

    .error-number {
        font-size: 6rem;
    }

    .quick-links {
        justify-content: center;
    }

    .search-field-wrapper {
        flex-direction: column;
    }
}
</style>

<?php get_footer(); ?>
