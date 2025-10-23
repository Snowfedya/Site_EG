<section id="testimonials" class="testimonials-section">
    <div class="container">
        <h2>What My Clients Say</h2>
        <div class="testimonial-slider">
            <!-- Placeholder for slider functionality -->
            <?php
            $args = array('post_type' => 'testimonials', 'posts_per_page' => 3);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="testimonial-slide card">
                    <div class="testimonial-content">
                        <?php the_content(); ?>
                    </div>
                    <div class="testimonial-author">
                        <strong><?php the_title(); ?></strong>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
