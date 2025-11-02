<?php
/**
 * The template for displaying the homepage
 *
 * @package Volkova_Theme
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

        <?php
        // Hero Section
        get_template_part( 'template-parts/section', 'hero' );

        // About Me Section
        get_template_part( 'template-parts/section', 'about' );

        // Services Section
        get_template_part( 'template-parts/section', 'services' );

        // Blog/Articles Section
        get_template_part( 'template-parts/section', 'articles' );

        // Video Lectures Section
        get_template_part( 'template-parts/section', 'videos' );

        // Contact & Form Section
        get_template_part( 'template-parts/section', 'contact' );
        ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
