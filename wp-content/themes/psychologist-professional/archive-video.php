<?php
/**
 * Шаблон архива для видео (v2)
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
            <div class="video-grid">
                <?php while (have_posts()) : the_post(); ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('video-card'); ?>>
                        <a href="<?php the_permalink(); ?>" class="video-thumbnail-link">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('medium_large'); ?>
                            <?php else : ?>
                                <div class="thumbnail-placeholder"></div>
                            <?php endif; ?>
                            <div class="play-icon">▶</div>
                        </a>
                        <div class="video-content">
                            <h2 class="post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination">
                <?php the_posts_pagination(['mid_size' => 2]); ?>
            </div>

        <?php else : ?>
            <p><?php _e('В этом разделе пока нет видео.', 'psychologist-pro'); ?></p>
        <?php endif; ?>
    </div>
</main>

<style>
.video-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(300px, 1fr)); gap: 2rem; }
.video-card { background: white; border-radius: 8px; box-shadow: 0 4px 15px rgba(0,0,0,0.07); overflow: hidden; transition: transform 0.2s ease, box-shadow 0.2s ease; }
.video-card:hover { transform: translateY(-5px); box-shadow: 0 8px 25px rgba(0,0,0,0.1); }
.video-thumbnail-link { display: block; position: relative; }
.video-thumbnail-link img { width: 100%; height: auto; display: block; }
.thumbnail-placeholder { height: 170px; background-color: #e9e9e9; }
.play-icon { position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); font-size: 50px; color: white; background: rgba(0,0,0,0.5); border-radius: 50%; width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; opacity: 0; transition: opacity 0.2s ease; }
.video-card:hover .play-icon { opacity: 1; }
.video-content { padding: 1rem 1.25rem; }
.video-content .post-title { font-size: 1.2rem; margin: 0; }
.video-content .post-title a { color: inherit; text-decoration: none; }
</style>

<?php get_footer(); ?>
