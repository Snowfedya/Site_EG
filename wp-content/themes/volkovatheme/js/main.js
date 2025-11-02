// Main JS file for Volkova Theme
(function($) {
    'use strict';

    $(document).ready(function() {

        // 1. Mobile Menu Toggle
        $('.menu-toggle').on('click', function() {
            $('.main-navigation').toggleClass('toggled');
        });


        // 2. Sticky Header
        const header = $('.site-header');
        const headerOffset = header.offset().top;

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > headerOffset + 100) {
                header.addClass('sticky');
            } else {
                header.removeClass('sticky');
            }
        });


        // 3. Modal Window
        const modal = $('#appointment-modal');

        // Open modal
        $('a[href="#appointment-modal"]').on('click', function(e) {
            e.preventDefault();
            modal.addClass('active');
        });

        // Close modal
        $('.close-modal, .modal-overlay').on('click', function(e) {
            if ($(e.target).is('.modal-overlay, .close-modal')) {
                e.preventDefault();
                modal.removeClass('active');
            }
        });

        // Close modal with ESC key
        $(document).on('keydown', function(e) {
            if (e.key === "Escape" && modal.hasClass('active')) {
                modal.removeClass('active');
            }
        });


        // 4. Back to Top Button
        const backToTopButton = $('.back-to-top-button');

        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 300) {
                backToTopButton.addClass('visible');
            } else {
                backToTopButton.removeClass('visible');
            }
        });

        backToTopButton.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 500);
        });


        // 5. Smooth Scrolling for anchor links
        $('a[href*="#"]:not([href="#"]):not([href="#appointment-modal"])').click(function(event) {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') && location.hostname == this.hostname) {
                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top
                    }, 800);
                }
            }
        });


        // 6. Article Filtering (AJAX simulation)
        $('.filter-button').on('click', function() {
            const filter = $(this).data('filter');

            // Update active button state
            $('.filter-button').removeClass('active');
            $(this).addClass('active');

            // Filter logic
            if (filter === 'all') {
                $('.article-card').fadeIn();
            } else {
                $('.article-card').hide();
                $('.article-card[data-category="' + filter + '"]').fadeIn();
            }
        });

    });

})(jQuery);
