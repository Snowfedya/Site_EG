<?php get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">Welcome to My Practice</h1>
                </header>
                <div class="entry-content">
                    <p>As a dedicated psychologist, I'm here to provide a safe, confidential, and supportive space where you can explore your thoughts and feelings. My goal is to help you navigate life's challenges, understand yourself better, and develop the tools you need to thrive. I offer a personalized approach to therapy, tailored to your unique needs and circumstances.</p>
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>
