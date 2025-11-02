<?php
/**
 * Template part for displaying the Video Lectures section
 *
 * @package Volkova_Theme
 */

require_once get_template_directory() . '/template-parts/placeholder-data.php';
?>

<section id="videos" class="videos-section">
    <div class="container">
        <h2 class="section-title"><?php echo esc_html( $videos_data['title'] ); ?></h2>
        <div class="videos-layout">
            <div class="video-main">
                <div class="video-player">
                    <!-- Placeholder for the main video embed -->
                    <iframe src="<?php echo esc_url( $videos_data['main_video']['url'] ); ?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                </div>
                <div class="video-info">
                    <h3 class="video-title"><?php echo esc_html( $videos_data['main_video']['title'] ); ?></h3>
                    <div class="video-meta">
                        <span><?php echo esc_html( $videos_data['main_video']['date'] ); ?></span>
                        <span><?php echo esc_html( $videos_data['main_video']['views'] ); ?></span>
                    </div>
                </div>
            </div>
            <div class="video-playlist">
                <!-- Placeholder for 4 video items in the playlist -->
                <?php foreach ( $videos_data['playlist'] as $video ) : ?>
                <div class="video-playlist-item">
                    <div class="video-playlist-thumbnail">
                        <img src="<?php echo get_template_directory_uri(); ?>/images/video-placeholder.jpg" alt="<?php echo esc_attr( $video['title'] ); ?>">
                        <span class="video-duration"><?php echo esc_html( $video['duration'] ); ?></span>
                    </div>
                    <div class="video-playlist-info">
                        <h4 class="video-playlist-title"><?php echo esc_html( $video['title'] ); ?></h4>
                        <span class="video-playlist-views"><?php echo esc_html( $video['views'] ); ?></span>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
