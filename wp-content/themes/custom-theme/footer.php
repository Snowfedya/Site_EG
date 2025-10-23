<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="footer-menu">
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'footer-menu',
                    'menu_id'        => 'footer-menu',
                )
            );
            ?>
        </div>
        <div class="site-info">
            &copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?> | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
