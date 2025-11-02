<?php
/**
 * Шаблон для отдельного Вопроса-ответа
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="post-header">
                    <h1 class="post-title"><?php _e('Вопрос:', 'psychologist-pro'); ?> <?php the_title(); ?></h1>
                    <?php 
                    $asker_name = get_post_meta(get_the_ID(), '_asker_name', true);
                    if ($asker_name) {
                        printf('<div class="asker-info">' . __('Задал(а): %s', 'psychologist-pro') . '</div>', esc_html($asker_name));
                    }
                    ?>
                </header>

                <div class="post-content answer-content">
                    <h3><?php _e('Ответ психолога:', 'psychologist-pro'); ?></h3>
                    <?php the_content(); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.asker-info {
    font-style: italic;
    color: #777;
    margin-top: -1rem;
    margin-bottom: 2rem;
}
.answer-content h3 {
    margin-bottom: 1rem;
}
</style>

<?php get_footer(); ?>
