<?php
/**
 * Шаблон для отдельной аудиозаписи
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="post-header">
                    <h1 class="post-title"><?php the_title(); ?></h1>
                </header>

                <div class="post-content">
                    <?php 
                    $audio_url = get_post_meta(get_the_ID(), '_audio_url', true);
                    if ($audio_url) {
                        echo '<div class="audio-container">' . do_shortcode('[audio src="' . esc_url($audio_url) . '"]') . '</div>';
                    }
                    the_content(); 
                    ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.audio-container {
    margin-bottom: 1.5rem;
}
.audio-container .wp-audio-shortcode {
    width: 100%;
}
</style>

<?php get_footer(); ?>
