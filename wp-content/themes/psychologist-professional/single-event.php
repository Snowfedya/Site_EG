<?php
/**
 * Шаблон для отдельного События (Афиши)
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); 
            $date = get_post_meta(get_the_ID(), '_event_date', true);
            $time = get_post_meta(get_the_ID(), '_event_time', true);
            $location = get_post_meta(get_the_ID(), '_event_location', true);
            $price = get_post_meta(get_the_ID(), '_event_price', true);
            $url = get_post_meta(get_the_ID(), '_event_registration_url', true);
        ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-event'); ?>>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </header>

                <div class="event-details-card">
                    <div class="event-detail-item"><strong><?php _e('Дата:', 'psychologist-pro'); ?></strong> <?php echo date_i18n('d F Y', strtotime($date)); ?></div>
                    <div class="event-detail-item"><strong><?php _e('Время:', 'psychologist-pro'); ?></strong> <?php echo esc_html($time); ?></div>
                    <div class="event-detail-item"><strong><?php _e('Место:', 'psychologist-pro'); ?></strong> <?php echo esc_html($location); ?></div>
                    <div class="event-detail-item"><strong><?php _e('Стоимость:', 'psychologist-pro'); ?></strong> <?php echo esc_html($price); ?></div>
                </div>

                <?php if ($url) : ?>
                <div class="event-registration">
                    <a href="<?php echo esc_url($url); ?>" class="btn btn-primary btn-large" target="_blank" rel="noopener noreferrer"><?php _e('Зарегистрироваться', 'psychologist-pro'); ?></a>
                </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.event-details-card { 
    background: var(--light-gray); 
    border-left: 5px solid var(--primary-color); 
    padding: 1.5rem 2rem; 
    margin: 2rem 0; 
    display: grid; 
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    border-radius: 8px;
}
.event-detail-item { font-size: 1.1rem; }
.event-registration { text-align: center; margin: 2.5rem 0; }
</style>

<?php get_footer(); ?>
