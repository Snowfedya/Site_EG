<section id="services" class="services-section">
    <div class="container">
        <h2>Our Services</h2>
        <div class="services-grid">
            <?php
            $args = array('post_type' => 'services', 'posts_per_page' => 3);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="service-card card">
                    <?php the_post_thumbnail('medium'); ?>
                    <h3><?php the_title(); ?></h3>
                    <?php the_excerpt(); ?>
                    <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
