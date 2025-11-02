/*!
 * Psychologist Professional - Main JavaScript
 * Профессиональная тема для психолога
 * Version: 1.0.0
 */

(function($) {
    'use strict';

    // Глобальные переменные
    let isMenuOpen = false;
    let scrolled = false;

    /**
     * Инициализация при загрузке DOM
     */
    $(document).ready(function() {
        initNavigation();
        initScrollEffects();
        initModal();
        initAppointmentForm();
        initBackToTop();
        initSmoothScroll();
        initAnimations();
        initNotifications();

        console.log('Psychologist Professional Theme Loaded ✓');
    });

    /**
     * НАВИГАЦИЯ И МОБИЛЬНОЕ МЕНЮ
     */
    function initNavigation() {
        const $menuToggle = $('.menu-toggle');
        const $mainNav = $('.main-nav');
        const $navMenu = $('.nav-menu');

        // Обработчик мобильного меню
        $menuToggle.on('click', function(e) {
            e.preventDefault();
            toggleMobileMenu();
        });

        // Закрытие меню при клике на ссылку
        $navMenu.find('a').on('click', function() {
            if (isMenuOpen) {
                toggleMobileMenu();
            }
        });

        // Закрытие меню при клике вне его области
        $(document).on('click', function(e) {
            if (isMenuOpen && !$(e.target).closest('.main-navigation').length) {
                toggleMobileMenu();
            }
        });

        // Закрытие меню по ESC
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && isMenuOpen) {
                toggleMobileMenu();
            }
        });

        function toggleMobileMenu() {
            isMenuOpen = !isMenuOpen;
            $mainNav.toggleClass('active', isMenuOpen);
            $menuToggle.toggleClass('active', isMenuOpen);
            $('body').toggleClass('menu-open', isMenuOpen);

            // Анимация иконки бургера
            const $menuIcon = $menuToggle.find('.menu-icon span');
            if (isMenuOpen) {
                $menuIcon.eq(0).css('transform', 'translateY(8px) rotate(45deg)');
                $menuIcon.eq(1).css('opacity', '0');
                $menuIcon.eq(2).css('transform', 'translateY(-8px) rotate(-45deg)');
            } else {
                $menuIcon.css({'transform': '', 'opacity': ''});
            }
        }
    }

    /**
     * ЭФФЕКТЫ ПРОКРУТКИ
     */
    function initScrollEffects() {
        const $header = $('.site-header');
        let lastScrollTop = 0;
        let ticking = false;

        function updateHeader() {
            const scrollTop = $(window).scrollTop();

            // Скрытие/показ заголовка при прокрутке
            if (scrollTop > lastScrollTop && scrollTop > 100) {
                // Прокрутка вниз
                $header.addClass('header-hidden');
            } else {
                // Прокрутка вверх
                $header.removeClass('header-hidden');
            }

            // Изменение стиля заголовка
            if (scrollTop > 50) {
                if (!scrolled) {
                    $header.addClass('scrolled');
                    scrolled = true;
                }
            } else {
                if (scrolled) {
                    $header.removeClass('scrolled');
                    scrolled = false;
                }
            }

            lastScrollTop = scrollTop;
            ticking = false;
        }

        $(window).on('scroll', function() {
            if (!ticking) {
                requestAnimationFrame(updateHeader);
                ticking = true;
            }
        });

        // Активная секция в навигации
        const $sections = $('section[id]');
        const $navLinks = $('.nav-menu a[href^="#"]');

        if ($sections.length && $navLinks.length) {
            $(window).on('scroll', throttle(function() {
                let current = '';

                $sections.each(function() {
                    const $section = $(this);
                    const sectionTop = $section.offset().top - 100;

                    if ($(window).scrollTop() >= sectionTop) {
                        current = $section.attr('id');
                    }
                });

                $navLinks.removeClass('active');
                if (current) {
                    $navLinks.filter('[href="#' + current + '"]').addClass('active');
                }
            }, 100));
        }
    }

    /**
     * МОДАЛЬНЫЕ ОКНА
     */
    function initModal() {
        const $modal = $('.modal');
        const $appointmentBtns = $('.appointment-btn, a[href="#appointment-form"]');
        const $modalClose = $('.modal-close');

        // Открытие модального окна
        $appointmentBtns.on('click', function(e) {
            e.preventDefault();
            openModal();
        });

        // Закрытие модального окна
        $modalClose.on('click', closeModal);

        // Закрытие по клику на фон
        $modal.on('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Закрытие по ESC
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $modal.hasClass('active')) {
                closeModal();
            }
        });

        function openModal() {
            $modal.addClass('active');
            $('body').addClass('modal-open').css('overflow', 'hidden');

            // Фокус на первом поле формы
            setTimeout(function() {
                $modal.find('input:first').focus();
            }, 300);
        }

        function closeModal() {
            $modal.removeClass('active');
            $('body').removeClass('modal-open').css('overflow', '');

            // Сброс формы при закрытии
            $modal.find('form')[0]?.reset();
            $modal.find('.form-group').removeClass('error');
        }
    }

    /**
     * ФОРМА ЗАПИСИ НА КОНСУЛЬТАЦИЮ
     */
    function initAppointmentForm() {
        const $form = $('#appointment-form');

        if (!$form.length) return;

        // Валидация в реальном времени
        $form.find('input, select, textarea').on('blur', function() {
            validateField($(this));
        });

        // Отправка формы
        $form.on('submit', function(e) {
            e.preventDefault();

            if (validateForm($form)) {
                submitAppointmentForm($form);
            }
        });

        // Согласие на обработку данных
        const $gdprCheckbox = $('#gdpr-consent');
        const $submitBtn = $form.find('button[type="submit"]');

        $gdprCheckbox.on('change', function() {
            $submitBtn.prop('disabled', !this.checked);
        });

        // Установка минимальной даты (завтра)
        const $dateInput = $('#appointment-date');
        if ($dateInput.length) {
            const tomorrow = new Date();
            tomorrow.setDate(tomorrow.getDate() + 1);
            $dateInput.attr('min', tomorrow.toISOString().split('T')[0]);
        }
    }

    /**
     * Валидация поля формы
     */
    function validateField($field) {
        const $group = $field.closest('.form-group');
        const value = $field.val().trim();
        const type = $field.attr('type');
        const required = $field.prop('required');

        $group.removeClass('error success');

        if (required && !value) {
            showFieldError($group, 'Это поле обязательно для заполнения');
            return false;
        }

        if (value) {
            if (type === 'email' && !isValidEmail(value)) {
                showFieldError($group, 'Введите корректный email адрес');
                return false;
            }

            if (type === 'tel' && !isValidPhone(value)) {
                showFieldError($group, 'Введите корректный номер телефона');
                return false;
            }
        }

        if (value || !required) {
            $group.addClass('success');
            return true;
        }

        return true;
    }

    /**
     * Валидация всей формы
     */
    function validateForm($form) {
        let isValid = true;

        $form.find('input[required], select[required], textarea[required]').each(function() {
            if (!validateField($(this))) {
                isValid = false;
            }
        });

        // Проверка GDPR согласия
        const $gdprCheckbox = $('#gdpr-consent');
        if ($gdprCheckbox.length && !$gdprCheckbox.prop('checked')) {
            showNotification('Необходимо дать согласие на обработку персональных данных', 'error');
            isValid = false;
        }

        return isValid;
    }

    /**
     * Отправка формы записи
     */
    function submitAppointmentForm($form) {
        const $submitBtn = $form.find('button[type="submit"]');
        const $btnText = $submitBtn.find('.btn-text');
        const $btnLoading = $submitBtn.find('.btn-loading');

        // Состояние загрузки
        $submitBtn.prop('disabled', true).addClass('loading');
        $btnText.hide();
        $btnLoading.show();

        const formData = new FormData($form[0]);

        // AJAX запрос
        $.ajax({
            url: psychologist_pro_ajax.ajax_url,
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            timeout: 30000,
            success: function(response) {
                if (response.success) {
                    showNotification(response.data, 'success');
                    $form[0].reset();
                    $('.form-group').removeClass('error success');

                    // Закрытие модального окна через 2 секунды
                    setTimeout(function() {
                        $('.modal').removeClass('active');
                        $('body').removeClass('modal-open').css('overflow', '');
                    }, 2000);
                } else {
                    showNotification(response.data || 'Произошла ошибка при отправке формы', 'error');
                }
            },
            error: function(xhr, status, error) {
                console.error('Form submission error:', status, error);

                if (status === 'timeout') {
                    showNotification('Превышено время ожидания. Попробуйте еще раз.', 'error');
                } else {
                    showNotification('Ошибка соединения. Проверьте интернет и попробуйте снова.', 'error');
                }
            },
            complete: function() {
                // Сброс состояния кнопки
                $submitBtn.prop('disabled', false).removeClass('loading');
                $btnText.show();
                $btnLoading.hide();
            }
        });
    }

    /**
     * Показать ошибку поля
     */
    function showFieldError($group, message) {
        $group.addClass('error');

        let $errorMsg = $group.find('.field-error');
        if (!$errorMsg.length) {
            $errorMsg = $('<div class="field-error"></div>');
            $group.append($errorMsg);
        }
        $errorMsg.text(message);
    }

    /**
     * КНОПКА "НАВЕРХ"
     */
    function initBackToTop() {
        const $backToTop = $('.back-to-top');

        if (!$backToTop.length) return;

        $(window).on('scroll', throttle(function() {
            if ($(window).scrollTop() > 300) {
                $backToTop.addClass('visible');
            } else {
                $backToTop.removeClass('visible');
            }
        }, 100));

        $backToTop.on('click', function(e) {
            e.preventDefault();
            $('html, body').animate({ scrollTop: 0 }, {
                duration: 800,
                easing: 'easeOutCubic'
            });
        });
    }

    /**
     * ПЛАВНАЯ ПРОКРУТКА ДО ЯКОРЕЙ
     */
    function initSmoothScroll() {
        $('a[href*="#"]:not([href="#"])').on('click', function(e) {
            const href = $(this).attr('href');
            const hashIndex = href.indexOf('#');

            if (hashIndex === -1) return;

            const hash = href.substring(hashIndex);
            if (!hash || hash === '#') return;

            const $target = $(hash);
            if (!$target.length) return;

            e.preventDefault();

            // Закрытие мобильного меню если открыто
            if (isMenuOpen) {
                $('.main-nav').removeClass('active');
                $('.menu-toggle').removeClass('active');
                $('body').removeClass('menu-open');
                isMenuOpen = false;
            }

            const targetOffset = $target.offset().top - 80; // Высота заголовка

            $('html, body').animate({ scrollTop: targetOffset }, {
                duration: 800,
                easing: 'easeOutCubic'
            });
        });
    }

    /**
     * АНИМАЦИИ ПРИ ПОЯВЛЕНИИ
     */
    function initAnimations() {
        if (!window.IntersectionObserver) return;

        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(function(entry) {
                if (entry.isIntersecting) {
                    const $target = $(entry.target);
                    $target.addClass('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        // Наблюдение за элементами
        $('.service-card, .testimonial-card, .blog-card, .post-card, .stat-item').each(function() {
            observer.observe(this);
        });
    }

    /**
     * СИСТЕМА УВЕДОМЛЕНИЙ
     */
    function initNotifications() {
        // Создание контейнера уведомлений если его нет
        if (!$('#notifications').length) {
            $('body').append('<div id="notifications" class="notifications-container"></div>');
        }
    }

    /**
     * Показать уведомление
     */
    function showNotification(message, type = 'success', duration = 5000) {
        const $container = $('#notifications');
        const notificationId = 'notification-' + Date.now();

        const $notification = $(`
            <div id="${notificationId}" class="notification ${type}">
                ${escapeHtml(message)}
            </div>
        `);

        $container.append($notification);

        // Показать уведомление
        requestAnimationFrame(function() {
            $notification.addClass('show');
        });

        // Автоматическое скрытие
        setTimeout(function() {
            hideNotification(notificationId);
        }, duration);

        // Закрытие по клику
        $notification.on('click', function() {
            hideNotification(notificationId);
        });
    }

    /**
     * Скрыть уведомление
     */
    function hideNotification(notificationId) {
        const $notification = $('#' + notificationId);
        $notification.removeClass('show');

        setTimeout(function() {
            $notification.remove();
        }, 300);
    }

    /**
     * ВСПОМОГАТЕЛЬНЫЕ ФУНКЦИИ
     */

    // Throttle функция для оптимизации событий
    function throttle(func, wait) {
        let timeout;
        let previous = 0;

        return function executedFunction(...args) {
            const now = Date.now();

            if (!previous) previous = now;

            const remaining = wait - (now - previous);

            if (remaining <= 0 || remaining > wait) {
                if (timeout) {
                    clearTimeout(timeout);
                    timeout = null;
                }
                previous = now;
                func.apply(this, args);
            } else if (!timeout) {
                timeout = setTimeout(function() {
                    previous = Date.now();
                    timeout = null;
                    func.apply(this, args);
                }, remaining);
            }
        };
    }

    // Debounce функция
    function debounce(func, wait, immediate = false) {
        let timeout;

        return function executedFunction(...args) {
            const later = () => {
                timeout = null;
                if (!immediate) func.apply(this, args);
            };

            const callNow = immediate && !timeout;
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);

            if (callNow) func.apply(this, args);
        };
    }

    // Валидация email
    function isValidEmail(email) {
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    // Валидация телефона
    function isValidPhone(phone) {
        const phoneRegex = /^[\+]?[\d\s\(\)\-]{10,}$/;
        return phoneRegex.test(phone);
    }

    // Экранирование HTML
    function escapeHtml(text) {
        const map = {
            '&': '&amp;',
            '<': '&lt;',
            '>': '&gt;',
            '"': '&quot;',
            "'": '&#039;'
        };
        return text.replace(/[&<>"']/g, function(m) { return map[m]; });
    }

    // Добавление easing функций для jQuery
    $.extend($.easing, {
        easeOutCubic: function(x) {
            return 1 - Math.pow(1 - x, 3);
        }
    });

    // Глобальная функция для показа уведомлений (доступна извне)
    window.showNotification = showNotification;

})(jQuery);

/**
 * ДОПОЛНИТЕЛЬНАЯ ИНИЦИАЛИЗАЦИЯ БЕЗ JQUERY
 */
document.addEventListener('DOMContentLoaded', function() {
    // Lazy loading изображений (если поддерживается)
    if ('IntersectionObserver' in window) {
        const lazyImages = document.querySelectorAll('img[data-src]');

        if (lazyImages.length) {
            const imageObserver = new IntersectionObserver(function(entries, observer) {
                entries.forEach(function(entry) {
                    if (entry.isIntersecting) {
                        const img = entry.target;
                        img.src = img.dataset.src;
                        img.classList.remove('lazy');
                        observer.unobserve(img);
                    }
                });
            });

            lazyImages.forEach(function(img) {
                imageObserver.observe(img);
            });
        }
    }

    // Прогресс чтения (для отдельных постов)
    if (document.body.classList.contains('single-post-page')) {
        const progressBar = document.createElement('div');
        progressBar.className = 'reading-progress';
        progressBar.style.cssText = `
            position: fixed;
            top: 0;
            left: 0;
            width: 0%;
            height: 3px;
            background: var(--primary-color);
            z-index: 1001;
            transition: width 0.1s ease-out;
        `;
        document.body.appendChild(progressBar);

        window.addEventListener('scroll', function() {
            const winScroll = document.body.scrollTop || document.documentElement.scrollTop;
            const height = document.documentElement.scrollHeight - document.documentElement.clientHeight;
            const scrolled = (winScroll / height) * 100;
            progressBar.style.width = scrolled + '%';
        });
    }

    // Улучшение доступности
    document.addEventListener('keydown', function(e) {
        // Tab navigation для модальных окон
        if (e.key === 'Tab') {
            const activeModal = document.querySelector('.modal.active');
            if (activeModal) {
                trapFocus(e, activeModal);
            }
        }
    });

    function trapFocus(e, container) {
        const focusableElements = container.querySelectorAll(
            'button, [href], input, select, textarea, [tabindex]:not([tabindex="-1"])'
        );
        const firstFocusable = focusableElements[0];
        const lastFocusable = focusableElements[focusableElements.length - 1];

        if (e.shiftKey) {
            if (document.activeElement === firstFocusable) {
                lastFocusable.focus();
                e.preventDefault();
            }
        } else {
            if (document.activeElement === lastFocusable) {
                firstFocusable.focus();
                e.preventDefault();
            }
        }
    }

    console.log('Psychologist Professional - Advanced features loaded ✓');
});
