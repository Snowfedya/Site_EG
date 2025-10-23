<?php
/*
Template Name: About Page
*/
get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">About Me</h1>
                </header>
                <div class="entry-content">
                    <p>With over a decade of experience in the field, I have dedicated my career to helping individuals overcome personal obstacles and improve their mental well-being. I specialize in a range of therapeutic techniques, including cognitive-behavioral therapy (CBT) and mindfulness, to create a holistic and effective treatment plan. My practice is founded on the principles of empathy, trust, and understanding, and I am committed to fostering a non-judgmental environment for all my clients.</p>
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>
