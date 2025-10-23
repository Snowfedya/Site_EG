<?php
/*
Template Name: Contact Page
*/
get_header(); ?>

<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title">Contact Me</h1>
                </header>
                <div class="entry-content">
                    <p>If you have any questions or would like to schedule an appointment, please feel free to reach out. I look forward to hearing from you.</p>
                    <form action="" method="post">
                        <p><label for="name">Name:</label><br>
                        <input type="text" id="name" name="name" style="width: 100%;"></p>
                        <p><label for="email">Email:</label><br>
                        <input type="email" id="email" name="email" style="width: 100%;"></p>
                        <p><label for="message">Message:</label><br>
                        <textarea id="message" name="message" rows="5" style="width: 100%;"></textarea></p>
                        <p><input type="submit" value="Send"></p>
                    </form>
                </div>
            </article>
        </main>
    </div>
</div>

<?php get_footer(); ?>
