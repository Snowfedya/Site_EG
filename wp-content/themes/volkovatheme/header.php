<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <main>
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Volkova_Theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <!-- SEO Meta Tags -->
    <meta name="description" content="Профессиональный психолог Елена Волкова. Индивидуальные и семейные консультации, работа с травмами, онлайн-прием.">
    <meta name="keywords" content="психолог, психотерапевт, психотравматолог, консультация психолога, семейный психолог, онлайн психолог">

    <!-- Open Graph Meta Tags (for social sharing) -->
    <meta property="og:title" content="Елена Волкова - Психолог, психотравматолог">
    <meta property="og:description" content="Более 10 лет помогаю людям найти внутреннюю гармонию, справиться с трудностями и улучшить качество жизни.">
    <meta property="og:image" content="<?php echo get_template_directory_uri(); ?>/images/og-image.jpg">
    <meta property="og:url" content="<?php echo esc_url( home_url( '/' ) ); ?>">
    <meta property="og:type" content="website">

    <!-- Analytics Snippets -->
    <!-- Google Analytics (placeholder) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-XXXXXXXXX-X"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', 'UA-XXXXXXXXX-X');
    </script>
    <!-- Yandex.Metrika (placeholder) -->
    <script type="text/javascript" >
       (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
       m[i].l=1*new Date();
       for (var j = 0; j < document.scripts.length; j++) {if (document.scripts[j].src === r) { return; }}
       k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
       (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

       ym(XXXXXXXX, "init", {
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true
       });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/XXXXXXXX" style="position:absolute; left:-9999px;" alt="" /></div></noscript>

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'volkovatheme' ); ?></a>

<header id="masthead" class="site-header">
    <div class="container">
        <div class="site-branding">
             <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <!-- Placeholder for Logo or Initials -->
                <span class="site-title">Елена Волкова</span>
             </a>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
                <span class="hamburger-icon"></span>
            </button>
            <div class="primary-menu-wrapper">
                <?php
                wp_nav_menu(
                    array(
                        'theme_location' => 'primary',
                        'menu_id'        => 'primary-menu',
                        'container'      => false,
                    )
                );
                ?>
                 <a href="https://calendly.com/your_username" class="button button-cta" target="_blank" rel="noopener noreferrer">Записаться</a>
            </div>
        </nav><!-- #site-navigation -->
    </div>
</header><!-- #masthead -->

<div id="content" class="site-content">
