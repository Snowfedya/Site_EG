<?php
/**
 * Template Name: Ask a Question Page
 * Description: A page template to display the form for asking a psychologist a question.
 * 
 * @package Psychologist Professional
 */

get_header(); ?>

<main id="primary" class="site-main single-page">
    <div class="container">
        <?php while (have_posts()) : the_post(); ?>
            <article id="page-<?php the_ID(); ?>" <?php post_class('page-content'); ?>>
                <header class="page-header">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </header>

                <div class="page-content-editor">
                    <?php the_content(); // Outputs content from the WordPress editor ?>
                </div>

                <div class="ask-form-container">
                    <?php echo do_shortcode('[ask_psychologist_form]'); ?>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<style>
.ask-form-container {
    max-width: 700px;
    margin: 2rem auto;
    padding: 2rem;
    background: #f9f9f9;
    border-radius: 8px;
}
</style>

<?php get_footer(); ?>
