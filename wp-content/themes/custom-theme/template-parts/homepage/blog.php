<section id="blog" class="blog-section">
    <div class="container">
        <h2>From the Blog</h2>
        <div class="blog-grid">
            <?php
            $args = array('post_type' => 'post', 'posts_per_page' => 3);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="blog-post-card card">
                    <?php the_post_thumbnail('medium'); ?>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <?php the_excerpt(); ?>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
