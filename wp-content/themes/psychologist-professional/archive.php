<?php
/**
 * Шаблон архива
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                if (is_category()) :
                    single_cat_title();
                elseif (is_tag()) :
                    single_tag_title();
                elseif (is_author()) :
                    printf(__('Автор: %s', 'psychologist-pro'), get_the_author());
                elseif (is_post_type_archive()) :
                    post_type_archive_title();
                elseif (is_day()) :
                    printf(__('День: %s', 'psychologist-pro'), get_the_date());
                elseif (is_month()) :
                    printf(__('Месяц: %s', 'psychologist-pro'), get_the_date('F Y'));
                elseif (is_year()) :
                    printf(__('Год: %s', 'psychologist-pro'), get_the_date('Y'));
                else :
                    _e('Архивы', 'psychologist-pro');
                endif;
                ?>
            </h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="<?php echo is_post_type_archive('services') ? 'services-grid' : 'posts-grid'; ?>">
                <?php while (have_posts()) : the_post(); ?>
                    <?php if (get_post_type() === 'services') : ?>
                        <!-- Карточка услуги -->
                        <div class="service-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="service-image">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('service-thumb'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="service-content">
                                <h3 class="service-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="service-excerpt"><?php the_excerpt(); ?></p>

                                <?php 
                                $price = get_post_meta(get_the_ID(), '_service_price', true);
                                $duration = get_post_meta(get_the_ID(), '_service_duration', true);
                                if ($price || $duration) : 
                                ?>
                                    <div class="service-details">
                                        <?php if ($duration) : ?>
                                            <div class="service-duration">
                                                <span class="detail-icon">🕒</span>
                                                <span><?php echo esc_html($duration); ?> <?php _e('мин', 'psychologist-pro'); ?></span>
                                            </div>
                                        <?php endif; ?>

                                        <?php if ($price) : ?>
                                            <div class="service-price">
                                                <span class="price-amount"><?php echo esc_html($price); ?></span>
                                                <span class="price-currency"><?php _e('руб', 'psychologist-pro'); ?></span>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php the_permalink(); ?>" class="btn btn-outline">
                                    <?php _e('Подробнее', 'psychologist-pro'); ?>
                                </a>
                            </div>
                        </div>

                    <?php elseif (get_post_type() === 'testimonials') : ?>
                        <!-- Карточка отзыва -->
                        <?php 
                        $client_name = get_post_meta(get_the_ID(), '_client_name', true);
                        $client_age = get_post_meta(get_the_ID(), '_client_age', true);
                        $rating = get_post_meta(get_the_ID(), '_rating', true);
                        ?>
                        <div class="testimonial-card">
                            <div class="testimonial-content">
                                <div class="testimonial-quote">
                                    <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M3 21C3 21 5 16 9 16S15 21 15 21H3ZM16 21C16 21 18 16 22 16S22 21 22 21H16Z" fill="currentColor"/>
                                    </svg>
                                </div>
                                <div class="testimonial-text"><?php the_content(); ?></div>
                                <?php if ($rating) : ?>
                                    <div class="testimonial-rating">
                                        <?php echo psychologist_pro_get_star_rating($rating); ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="testimonial-author">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="author-avatar">
                                        <?php the_post_thumbnail('testimonial-thumb'); ?>
                                    </div>
                                <?php endif; ?>
                                <div class="author-info">
                                    <div class="author-name"><?php echo esc_html($client_name ?: get_the_title()); ?></div>
                                    <?php if ($client_age) : ?>
                                        <div class="author-age"><?php echo esc_html($client_age); ?> <?php _e('лет', 'psychologist-pro'); ?></div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                    <?php else : ?>
                        <!-- Обычная запись блога -->
                        <article class="post-card">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="post-thumbnail">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail('medium'); ?>
                                    </a>
                                </div>
                            <?php endif; ?>

                            <div class="post-content">
                                <div class="post-meta">
                                    <time class="post-date"><?php echo get_the_date(); ?></time>
                                    <div class="post-categories">
                                        <?php the_category(', '); ?>
                                    </div>
                                </div>

                                <h2 class="post-title">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h2>

                                <div class="post-excerpt">
                                    <?php the_excerpt(); ?>
                                </div>

                                <a href="<?php the_permalink(); ?>" class="read-more">
                                    <?php _e('Читать далее', 'psychologist-pro'); ?>
                                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>
                            </div>
                        </article>
                    <?php endif; ?>
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
            <div class="no-posts">
                <h2><?php _e('Ничего не найдено', 'psychologist-pro'); ?></h2>
                <p><?php _e('В этом разделе пока нет материалов.', 'psychologist-pro'); ?></p>
                <a href="<?php echo home_url(); ?>" class="btn btn-primary">
                    <?php _e('На главную', 'psychologist-pro'); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
