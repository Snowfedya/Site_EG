<?php
/*
Template Name: About Page
*/
get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php
            while (have_posts()) :
                the_post();
                get_template_part('template-parts/content', 'page');
            endwhile;
            ?>
        </main>
    </div>
</div>

<?php get_footer(); ?>
