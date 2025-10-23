<section id="videos" class="videos-section">
    <div class="container">
        <h2>Video Gallery</h2>
        <div class="videos-grid">
            <?php
            $args = array('post_type' => 'videos', 'posts_per_page' => 3);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="video-card card">
                    <?php the_post_thumbnail('medium'); ?>
                    <h3><?php the_title(); ?></h3>
                    <!-- Placeholder for paid/free status -->
                    <span class="video-status">[Free/Paid]</span>
                    <a href="<?php the_permalink(); ?>" class="btn btn-secondary">Watch Now</a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
