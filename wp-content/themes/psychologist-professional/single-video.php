<?php
/**
 * Шаблон для отдельного видео (v2)
 * Теперь использует the_content() для вывода видео из редактора.
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post single-video'); ?>>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </header>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
