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
                 <a href="#appointment-modal" class="button button-cta">Записаться</a>
            </div>
        </nav><!-- #site-navigation -->
    </div>
</header><!-- #masthead -->

<div id="content" class="site-content">
