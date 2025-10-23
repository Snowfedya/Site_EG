<?php get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('service-single'); ?>>
                    <header class="entry-header">
                        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    </header>

                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail('large'); ?>
                        </div>
                    <?php endif; ?>

                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>

                    <div class="booking-section">
                        <h2>Book This Service</h2>
                        <p><strong>[Placeholder for BookingPress Premium calendar shortcode]</strong></p>
                    </div>
                </article>
            <?php endwhile; ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
