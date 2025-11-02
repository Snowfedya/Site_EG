<?php
/**
 * Шаблон отдельной записи
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-post-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('single-post'); ?>>
                <header class="post-header">
                    <div class="post-meta">
                        <time class="post-date"><?php echo get_the_date(); ?></time>
                        <div class="post-categories">
                            <?php the_category(', '); ?>
                        </div>
                        <div class="reading-time">
                            <?php echo psychologist_pro_reading_time(); ?> <?php _e('мин чтения', 'psychologist-pro'); ?>
                        </div>
                    </div>

                    <h1 class="post-title"><?php the_title(); ?></h1>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>
                </header>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <footer class="post-footer">
                    <?php if (has_tag()) : ?>
                        <div class="post-tags">
                            <span class="tags-label"><?php _e('Теги:', 'psychologist-pro'); ?></span>
                            <?php the_tags('', ', ', ''); ?>
                        </div>
                    <?php endif; ?>

                    <div class="post-share">
                        <span class="share-label"><?php _e('Поделиться:', 'psychologist-pro'); ?></span>
                        <div class="share-buttons">
                            <a href="https://vk.com/share.php?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn vk">VK</a>
                            <a href="https://t.me/share/url?url=<?php echo urlencode(get_permalink()); ?>" target="_blank" class="share-btn telegram">Telegram</a>
                            <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' ' . get_permalink()); ?>" target="_blank" class="share-btn whatsapp">WhatsApp</a>
                        </div>
                    </div>
                </footer>
            </article>

            <nav class="post-navigation">
                <div class="nav-links">
                    <?php
                    $prev_post = get_previous_post();
                    $next_post = get_next_post();
                    ?>

                    <?php if ($prev_post) : ?>
                        <div class="nav-previous">
                            <a href="<?php echo get_permalink($prev_post->ID); ?>">
                                <span class="nav-direction"><?php _e('← Предыдущая статья', 'psychologist-pro'); ?></span>
                                <span class="nav-title"><?php echo get_the_title($prev_post->ID); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>

                    <?php if ($next_post) : ?>
                        <div class="nav-next">
                            <a href="<?php echo get_permalink($next_post->ID); ?>">
                                <span class="nav-direction"><?php _e('Следующая статья →', 'psychologist-pro'); ?></span>
                                <span class="nav-title"><?php echo get_the_title($next_post->ID); ?></span>
                            </a>
                        </div>
                    <?php endif; ?>
                </div>
            </nav>

            <?php if (comments_open() || get_comments_number()) : ?>
                <div class="comments-section">
                    <?php comments_template(); ?>
                </div>
            <?php endif; ?>
        <?php endwhile; ?>
    </div>
</main>

<?php get_footer(); ?>
