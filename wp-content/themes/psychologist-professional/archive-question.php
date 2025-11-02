<?php
/**
 * Шаблон архива для Вопросов-ответов
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            <div class="archive-description">
                <p><?php _e('Здесь собраны ответы на вопросы, которые задавали посетители сайта.', 'psychologist-pro'); ?></p>
                <a href="<?php echo esc_url(get_permalink(get_page_by_path('ask-a-question'))); ?>" class="btn btn-primary"><?php _e('Задать свой вопрос', 'psychologist-pro'); ?></a>
            </div>
        </header>

        <?php if (have_posts()) : ?>
            <div class="question-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('question-item'); ?>>
                        <h2 class="post-title">
                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                        </h2>
                        <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Читать ответ', 'psychologist-pro'); ?></a>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(['mid_size' => 2]); ?>
            </div>

        <?php else : ?>
            <p><?php _e('Ответов на вопросы пока нет.', 'psychologist-pro'); ?></p>
        <?php endif; ?>
    </div>
</main>

<style>
.question-item {
    padding: 1.5rem;
    margin-bottom: 1rem;
    background: #f9f9f9;
    border-radius: 8px;
}
</style>

<?php get_footer(); ?>
