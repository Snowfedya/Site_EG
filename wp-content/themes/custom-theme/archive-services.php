<?php get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">

            <header class="page-header">
                <h1 class="page-title"><?php post_type_archive_title(); ?></h1>
            </header>

            <div class="services-archive-grid">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                ?>
                        <div class="service-card card">
                            <?php the_post_thumbnail('medium'); ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <?php the_excerpt(); ?>
                            <a href="<?php the_permalink(); ?>" class="btn btn-primary">Learn More</a>
                        </div>
                <?php
                    endwhile;
                else :
                    get_template_part('template-parts/content', 'none');
                endif;
                ?>
            </div>

        </main>
    </div>
</div>

<?php get_footer(); ?>
