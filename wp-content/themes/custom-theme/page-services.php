<?php
/*
Template Name: Services Page
*/
get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">My Services</h1>
                </header>
                <div class="entry-content">
                    <ul>
                        <li>Individual Therapy</li>
                        <li>Couples Counseling</li>
                        <li>Family Therapy</li>
                        <li>Group Therapy</li>
                        <li>Online Sessions</li>
                    </ul>
                    <p>I offer a variety of services to meet the diverse needs of my clients. Whether you are seeking support for personal growth, relationship issues, or specific mental health concerns, I am here to help. Each session is tailored to your individual goals, and I am committed to providing the highest quality of care.</p>
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>
