<?php
/**
 * Шаблон архива для аудио
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main">
    <div class="container">
        <header class="page-header">
            <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            <?php the_archive_description('<div class="archive-description">', '</div>'); ?>
        </header>

        <?php if (have_posts()) : ?>
            <div class="audio-list">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('audio-item'); ?>>
                        <div class="audio-content">
                            <h2 class="post-title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>
                            <div class="post-excerpt">
                                <?php the_excerpt(); ?>
                            </div>
                            <a href="<?php the_permalink(); ?>" class="read-more"><?php _e('Слушать аудио', 'psychologist-pro'); ?></a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(['mid_size' => 2]); ?>
            </div>

        <?php else : ?>
            <p><?php _e('В этом разделе пока нет аудиозаписей.', 'psychologist-pro'); ?></p>
        <?php endif; ?>
    </div>
</main>

<style>
.audio-item {
    padding: 1.5rem 0;
    border-bottom: 1px solid #eee;
}
</style>

<?php get_footer(); ?>
