<?php get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <?php
            while (have_posts()) :
                the_post();
            ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('event-single'); ?>>
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

                    <div class="event-details-section card">
                        <h2>Event Details</h2>
                        <ul>
                            <li><strong>Date:</strong> [Placeholder for Event Date]</li>
                            <li><strong>Time:</strong> [Placeholder for Event Time]</li>
                            <li><strong>Location:</strong> [Placeholder for Event Location]</li>
                        </ul>
                        <h3>Register for this Event</h3>
                        <p><strong>[Placeholder for The Events Calendar registration form shortcode]</strong></p>
                    </div>
                </article>
            <?php endwhile; ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
