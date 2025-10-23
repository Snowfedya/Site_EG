<section id="events" class="events-section">
    <div class="container">
        <h2>Upcoming Events</h2>
        <div class="events-list">
            <?php
            $args = array('post_type' => 'events', 'posts_per_page' => 2);
            $loop = new WP_Query($args);
            while ($loop->have_posts()) : $loop->the_post();
            ?>
                <div class="event-item card">
                    <div class="event-details">
                        <h3><?php the_title(); ?></h3>
                        <div class="event-meta">
                            <!-- Placeholders for event date and time -->
                            <span class="event-date">[Event Date]</span> | <span class="event-time">[Event Time]</span>
                        </div>
                        <?php the_excerpt(); ?>
                        <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More & Register</a>
                    </div>
                </div>
            <?php endwhile; wp_reset_postdata(); ?>
        </div>
    </div>
</section>
