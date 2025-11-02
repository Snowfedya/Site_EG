<?php
/**
 * Шаблон архива для Афиш (Событий)
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php _e('Афиша событий', 'psychologist-pro'); ?></h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>

        <?php
        $today = date('Y-m-d');
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $args = [
            'post_type' => 'event',
            'posts_per_page' => 10,
            'paged' => $paged,
            'meta_key' => '_event_date',
            'orderby' => 'meta_value',
            'order' => 'ASC',
            'meta_query' => [
                [
                    'key' => '_event_date',
                    'value' => $today,
                    'compare' => ' >=',
                    'type' => 'DATE'
                ]
            ]
        ];
        $events_query = new WP_Query($args);

        if ($events_query->have_posts()) : ?>
            <div class="event-list">
                <?php while ($events_query->have_posts()) : $events_query->the_post();
                    $date = get_post_meta(get_the_ID(), '_event_date', true);
                    $time = get_post_meta(get_the_ID(), '_event_time', true);
                    $location = get_post_meta(get_the_ID(), '_event_location', true);
                ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('event-item'); ?>>
                        <div class="event-date-tag">
                            <span class="month"><?php echo date_i18n('M', strtotime($date)); ?></span>
                            <span class="day"><?php echo date_i18n('d', strtotime($date)); ?></span>
                        </div>
                        <div class="event-details">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                            <div class="event-meta">
                                <span class="event-time"><?php echo esc_html($time); ?></span>
                                <span class="event-location"><?php echo esc_html($location); ?></span>
                            </div>
                        </div>
                        <div class="event-action">
                             <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php _e('Подробнее', 'psychologist-pro'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php 
                echo paginate_links([
                    'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                    'total' => $events_query->max_num_pages,
                    'current' => max(1, get_query_var('paged')),
                    'format' => '?paged=%#%',
                ]);
                ?>
            </div>

        <?php else : ?>
            <p><?php _e('В ближайшее время событий не запланировано.', 'psychologist-pro'); ?></p>
        <?php endif; wp_reset_postdata(); ?>
    </div>
</main>

<style>
.event-list { border: 1px solid #e0e0e0; border-radius: 8px; overflow: hidden; }
.event-item { display: flex; align-items: center; padding: 1.5rem; border-bottom: 1px solid #e0e0e0; gap: 1.5rem; }
.event-item:last-child { border-bottom: none; }
.event-date-tag { flex-shrink: 0; text-align: center; background-color: var(--primary-color); color: white; border-radius: 8px; padding: 10px 15px; font-weight: bold; line-height: 1.2; }
.event-date-tag .month { font-size: 0.9rem; text-transform: uppercase; display: block; }
.event-date-tag .day { font-size: 1.8rem; display: block; }
.event-details { flex-grow: 1; }
.event-details .post-title { margin: 0 0 0.5rem; font-size: 1.5rem; }
.event-meta { color: #777; }
.event-meta span:not(:last-child)::after { content: ' | '; margin: 0 0.5rem; }
.event-action { margin-left: auto; }
</style>

<?php get_footer(); ?>
