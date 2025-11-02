<?php
/**
 * Основной шаблон индекса
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title">
                <?php
                if (is_home() && is_front_page()) :
                    bloginfo('name');
                elseif (is_home()) :
                    _e('Блог', 'psychologist-pro');
                else :
                    the_archive_title();
                endif;
                ?>
            </h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="posts-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('post-card'); ?>>
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
                            </a>
                        </div>
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
            <div class="no-posts">
                <h2><?php _e('Ничего не найдено', 'psychologist-pro'); ?></h2>
                <p><?php _e('К сожалению, по вашему запросу ничего не найдено.', 'psychologist-pro'); ?></p>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php get_footer(); ?>
