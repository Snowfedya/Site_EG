<?php
/**
 * Template part for displaying the Video Lectures section
 *
 * @package Volkova_Theme
 */
?>

<section id="videos" class="videos-section">
    <div class="container">
        <h2 class="section-title">Видеолекции</h2>
        <div class="videos-layout">
            <div class="video-main">
                <div class="video-player">
                    <!-- Placeholder for the main video embed -->
                    <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3 class="video-title">Название основного видео</h3>
                    <div class="video-meta">
                        <span>1 ноября 2025</span>
                        <span>10,321 просмотров</span>
                    </div>
                </div>
            </div>
            <div class="video-playlist">
                <!-- Placeholder for 4 video items in the playlist -->
                <?php for ( $i = 1; $i <= 4; $i++ ) : ?>
                <div class="video-playlist-item">
                    <div class="video-playlist-thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/video-placeholder.jpg" alt="Название видео <?php echo $i; ?>">
                        <span class="video-duration">10:45</span>
                    </div>
                    <div class="video-playlist-info">
                        <h4 class="video-playlist-title">Название видео <?php echo $i; ?></h4>
                        <span class="video-playlist-views"><?php echo 1000 * $i; ?> просмотров</span>
                    </div>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>
