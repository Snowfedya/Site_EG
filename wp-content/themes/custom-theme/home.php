<?php get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <header class="page-header">
                <h1 class="page-title"><?php single_post_title(); ?></h1>
            </header>

            <?php
            if (have_posts()) :
                while (have_posts()) :
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>

        </main>
    </div>
</div>

<?php get_footer(); ?>
