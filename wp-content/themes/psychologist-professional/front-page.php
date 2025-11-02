<?php
/**
 * Главная страница темы психолога
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">

    <!-- Hero секция -->
    <section class="hero-section">
        <div class="container">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">
                        <?php echo get_theme_mod('hero_title', __('Профессиональная психологическая помощь', 'psychologist-pro')); ?>
                    </h1>
                    <p class="hero-subtitle">
                        <?php echo get_theme_mod('hero_subtitle', __('Помогаю людям найти внутреннюю гармонию и справиться с жизненными трудностями', 'psychologist-pro')); ?>
                    </p>
                    <div class="hero-features">
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span><?php _e('Более 10 лет опыта', 'psychologist-pro'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span><?php _e('Конфиденциальность гарантирована', 'psychologist-pro'); ?></span>
                        </div>
                        <div class="feature-item">
                            <span class="feature-icon">✓</span>
                            <span><?php _e('Индивидуальный подход', 'psychologist-pro'); ?></span>
                        </div>
                    </div>
                    <div class="hero-actions">
                        <a href="#appointment-form" class="btn btn-primary btn-large">
                            <?php _e('Записаться на консультацию', 'psychologist-pro'); ?>
                        </a>
                        <a href="#about" class="btn btn-outline btn-large">
                            <?php _e('Узнать больше', 'psychologist-pro'); ?>
                        </a>
                    </div>
                </div>

                <div class="hero-image">
                    <?php 
                    $hero_image = get_theme_mod('hero_image');
                    if ($hero_image) : 
                    ?>
                        <img src="<?php echo esc_url($hero_image); ?>" alt="<?php _e('Психолог', 'psychologist-pro'); ?>" class="hero-photo">
                    <?php else : ?>
                        <div class="hero-placeholder">
                            <div class="placeholder-icon">
                                <svg width="120" height="120" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 21V19C20 17.9391 19.5786 16.9217 18.8284 16.1716C18.0783 15.4214 17.0609 15 16 15H8C6.93913 15 5.92178 15.4214 5.17163 16.1716C4.42149 16.9217 4 17.9391 4 19V21" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                    <circle cx="12" cy="7" r="4" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </div>
                            <p><?php _e('Добавьте фото в настройках темы', 'psychologist-pro'); ?></p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Обо мне -->
    <section id="about" class="about-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title">
                    <?php echo get_theme_mod('about_title', __('Обо мне', 'psychologist-pro')); ?>
                </h2>
                <p class="section-subtitle">
                    <?php echo get_theme_mod('about_subtitle', __('Профессиональный психолог с многолетним опытом работы', 'psychologist-pro')); ?>
                </p>
            </div>

            <div class="about-content">
                <div class="about-text">
                    <?php 
                    $about_content = get_theme_mod('about_content', __('Я практикующий психолог с более чем 10-летним опытом работы. Помогаю людям справляться с различными жизненными трудностями, находить внутренние ресурсы и строить более гармоничные отношения.', 'psychologist-pro'));
                    echo wpautop($about_content);
                    ?>
                </div>

                <div class="about-stats">
                    <div class="stat-item">
                        <div class="stat-number">10+</div>
                        <div class="stat-label"><?php _e('лет опыта', 'psychologist-pro'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">500+</div>
                        <div class="stat-label"><?php _e('довольных клиентов', 'psychologist-pro'); ?></div>
                    </div>
                    <div class="stat-item">
                        <div class="stat-number">100%</div>
                        <div class="stat-label"><?php _e('конфиденциальность', 'psychologist-pro'); ?></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Услуги -->
    <section id="services" class="services-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Мои услуги', 'psychologist-pro'); ?></h2>
                <p class="section-subtitle"><?php _e('Профессиональная психологическая помощь по различным направлениям', 'psychologist-pro'); ?></p>
            </div>

            <div class="services-grid">
                <?php
                $services = get_posts(array(
                    'post_type' => 'services',
                    'numberposts' => -1,
                    'post_status' => 'publish'
                ));

                if ($services) :
                    foreach ($services as $service) :
                        $price = get_post_meta($service->ID, '_service_price', true);
                        $duration = get_post_meta($service->ID, '_service_duration', true);
                ?>
                    <div class="service-card">
                        <?php if (has_post_thumbnail($service->ID)) : ?>
                            <div class="service-image">
                                <?php echo get_the_post_thumbnail($service->ID, 'service-thumb'); ?>
                            </div>
                        <?php endif; ?>

                        <div class="service-content">
                            <h3 class="service-title"><?php echo get_the_title($service->ID); ?></h3>
                            <p class="service-excerpt"><?php echo get_the_excerpt($service->ID); ?></p>

                            <div class="service-details">
                                <?php if ($duration) : ?>
                                    <div class="service-duration">
                                        <span class="detail-icon">🕒</span>
                                        <span><?php echo esc_html($duration); ?> <?php _e('минут', 'psychologist-pro'); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if ($price) : ?>
                                    <div class="service-price">
                                        <span class="price-amount"><?php echo esc_html($price); ?></span>
                                        <span class="price-currency"><?php _e('руб', 'psychologist-pro'); ?></span>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <a href="<?php echo get_permalink($service->ID); ?>" class="btn btn-outline">
                                <?php _e('Подробнее', 'psychologist-pro'); ?>
                            </a>
                        </div>
                    </div>
                <?php 
                    endforeach;
                else :
                ?>
                    <!-- Дефолтные услуги -->
                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-title"><?php _e('Индивидуальная консультация', 'psychologist-pro'); ?></h3>
                            <p class="service-excerpt"><?php _e('Работа с личными проблемами, тревогой, депрессией, самооценкой и другими вопросами', 'psychologist-pro'); ?></p>
                            <div class="service-details">
                                <div class="service-duration">
                                    <span class="detail-icon">🕒</span>
                                    <span><?php _e('50 минут', 'psychologist-pro'); ?></span>
                                </div>
                                <div class="service-price">
                                    <span class="price-amount"><?php _e('3000', 'psychologist-pro'); ?></span>
                                    <span class="price-currency"><?php _e('руб', 'psychologist-pro'); ?></span>
                                </div>
                            </div>
                            <a href="#appointment-form" class="btn btn-outline"><?php _e('Записаться', 'psychologist-pro'); ?></a>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-title"><?php _e('Семейная терапия', 'psychologist-pro'); ?></h3>
                            <p class="service-excerpt"><?php _e('Решение семейных конфликтов, работа с парами, детско-родительские отношения', 'psychologist-pro'); ?></p>
                            <div class="service-details">
                                <div class="service-duration">
                                    <span class="detail-icon">🕒</span>
                                    <span><?php _e('60 минут', 'psychologist-pro'); ?></span>
                                </div>
                                <div class="service-price">
                                    <span class="price-amount"><?php _e('4000', 'psychologist-pro'); ?></span>
                                    <span class="price-currency"><?php _e('руб', 'psychologist-pro'); ?></span>
                                </div>
                            </div>
                            <a href="#appointment-form" class="btn btn-outline"><?php _e('Записаться', 'psychologist-pro'); ?></a>
                        </div>
                    </div>

                    <div class="service-card">
                        <div class="service-content">
                            <h3 class="service-title"><?php _e('Работа с травмами', 'psychologist-pro'); ?></h3>
                            <p class="service-excerpt"><?php _e('Психотравматология, ПТСР, работа с последствиями сложных жизненных ситуаций', 'psychologist-pro'); ?></p>
                            <div class="service-details">
                                <div class="service-duration">
                                    <span class="detail-icon">🕒</span>
                                    <span><?php _e('60 минут', 'psychologist-pro'); ?></span>
                                </div>
                                <div class="service-price">
                                    <span class="price-amount"><?php _e('3500', 'psychologist-pro'); ?></span>
                                    <span class="price-currency"><?php _e('руб', 'psychologist-pro'); ?></span>
                                </div>
                            </div>
                            <a href="#appointment-form" class="btn btn-outline"><?php _e('Записаться', 'psychologist-pro'); ?></a>
                        </div>
                    </div>
                <?php endif; ?>
            </div>

            <div class="section-cta">
                <a href="<?php echo get_post_type_archive_link('services'); ?>" class="btn btn-primary">
                    <?php _e('Все услуги', 'psychologist-pro'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Отзывы -->
    <section id="testimonials" class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Отзывы клиентов', 'psychologist-pro'); ?></h2>
                <p class="section-subtitle"><?php _e('Что говорят люди, с которыми я работал', 'psychologist-pro'); ?></p>
            </div>

            <div class="testimonials-grid">
                <?php
                $testimonials = get_posts(array(
                    'post_type' => 'testimonials',
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));

                if ($testimonials) :
                    foreach ($testimonials as $testimonial) :
                        $client_name = get_post_meta($testimonial->ID, '_client_name', true);
                        $client_age = get_post_meta($testimonial->ID, '_client_age', true);
                ?>
                    <div class="testimonial-card">
                        <div class="testimonial-content">
                            <div class="testimonial-quote">
                                <svg width="30" height="30" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M3 21C3 21 5 16 9 16S15 21 15 21H3ZM16 21C16 21 18 16 22 16S22 21 22 21H16Z" fill="currentColor"/>
                                </svg>
                            </div>
                            <p class="testimonial-text"><?php echo get_the_content(null, false, $testimonial->ID); ?></p>
                        </div>

                        <div class="testimonial-author">
                            <?php if (has_post_thumbnail($testimonial->ID)) : ?>
                                <div class="author-avatar">
                                    <?php echo get_the_post_thumbnail($testimonial->ID, 'testimonial-thumb'); ?>
                                </div>
                            <?php endif; ?>
                            <div class="author-info">
                                <div class="author-name"><?php echo esc_html($client_name ?: get_the_title($testimonial->ID)); ?></div>
                                <?php if ($client_age) : ?>
                                    <div class="author-age"><?php echo esc_html($client_age); ?> <?php _e('лет', 'psychologist-pro'); ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php 
                    endforeach;
                endif; 
                ?>
            </div>
        </div>
    </section>

    <!-- Последние статьи -->
    <section id="blog" class="blog-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Полезные материалы', 'psychologist-pro'); ?></h2>
                <p class="section-subtitle"><?php _e('Статьи о психологии и саморазвитии', 'psychologist-pro'); ?></p>
            </div>

            <div class="blog-grid">
                <?php
                $blog_posts = get_posts(array(
                    'numberposts' => 3,
                    'post_status' => 'publish'
                ));

                if ($blog_posts) :
                    foreach ($blog_posts as $post) :
                        setup_postdata($post);
                ?>
                    <article class="blog-card">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="blog-image">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('medium'); ?>
                                </a>
                            </div>
                        <?php endif; ?>

                        <div class="blog-content">
                            <div class="blog-meta">
                                <time class="blog-date"><?php echo get_the_date(); ?></time>
                                <div class="blog-categories">
                                    <?php the_category(', '); ?>
                                </div>
                            </div>

                            <h3 class="blog-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h3>

                            <p class="blog-excerpt"><?php the_excerpt(); ?></p>

                            <a href="<?php the_permalink(); ?>" class="read-more">
                                <?php _e('Читать далее', 'psychologist-pro'); ?>
                                <svg width="16" height="16" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5 12H19M19 12L12 5M19 12L12 19" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                            </a>
                        </div>
                    </article>
                <?php 
                    endforeach;
                    wp_reset_postdata();
                endif; 
                ?>
            </div>

            <div class="section-cta">
                <a href="<?php echo get_permalink(get_option('page_for_posts')); ?>" class="btn btn-outline">
                    <?php _e('Все статьи', 'psychologist-pro'); ?>
                </a>
            </div>
        </div>
    </section>

    <!-- Контакты -->
    <section id="contact" class="contact-section">
        <div class="container">
            <div class="section-header">
                <h2 class="section-title"><?php _e('Контакты', 'psychologist-pro'); ?></h2>
                <p class="section-subtitle"><?php _e('Свяжитесь со мной удобным способом', 'psychologist-pro'); ?></p>
            </div>

            <div class="contact-content">
                <div class="contact-info">
                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M4 4H20C21.1 4 22 4.9 22 6V18C22 19.1 21.1 20 20 20H4C2.9 20 2 19.1 2 18V6C2 4.9 2.9 4 4 4Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <polyline points="22,6 12,13 2,6" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <div class="contact-label"><?php _e('Email', 'psychologist-pro'); ?></div>
                            <div class="contact-value">
                                <a href="mailto:<?php echo get_theme_mod('contact_email', 'info@example.com'); ?>">
                                    <?php echo get_theme_mod('contact_email', 'info@example.com'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M22 16.92V19.92C22 20.52 21.39 21 20.88 20.92C11.07 19.82 5.18 13.93 4.08 4.12C4 3.61 4.48 3 5.08 3H8.08C8.68 3 9.18 3.5 9.19 4.1C9.29 5.79 9.59 7.43 10.07 8.97C10.18 9.27 10.1 9.61 9.86 9.86L8.05 11.67C9.35 14.17 11.83 16.65 14.33 17.95L16.14 16.14C16.39 15.9 16.73 15.82 17.03 15.93C18.57 16.41 20.21 16.71 21.9 16.81C22.5 16.82 23 17.32 23 17.92Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <div class="contact-label"><?php _e('Телефон', 'psychologist-pro'); ?></div>
                            <div class="contact-value">
                                <a href="tel:<?php echo get_theme_mod('contact_phone', '+7-495-123-45-67'); ?>">
                                    <?php echo get_theme_mod('contact_phone', '+7 (495) 123-45-67'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="contact-item">
                        <div class="contact-icon">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21 10C21 17 12 23 12 23S3 17 3 10C3 5.02944 7.02944 1 12 1C16.9706 1 21 5.02944 21 10Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                <circle cx="12" cy="10" r="3" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        </div>
                        <div class="contact-details">
                            <div class="contact-label"><?php _e('Адрес', 'psychologist-pro'); ?></div>
                            <div class="contact-value"><?php echo get_theme_mod('contact_address', 'Москва'); ?></div>
                        </div>
                    </div>
                </div>

                <div class="contact-cta">
                    <h3><?php _e('Готовы начать работу над собой?', 'psychologist-pro'); ?></h3>
                    <p><?php _e('Запишитесь на первую консультацию и сделайте первый шаг к изменениям', 'psychologist-pro'); ?></p>
                    <a href="#appointment-form" class="btn btn-primary btn-large">
                        <?php _e('Записаться на консультацию', 'psychologist-pro'); ?>
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>

<?php get_footer(); ?>
