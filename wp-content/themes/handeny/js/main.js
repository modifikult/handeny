jQuery(document).ready(function ($) {
    function header() {
        $(document).on('click', '.menu-main-menu-container > .menu > .menu-item-has-children', function (e) {
            e.preventDefault();

            const submenu = $(this).find('> .sub-menu');

            if ($(this).hasClass('menu--open')) {
                $(this).removeClass('menu--open');
            } else {
                $('.menu-main-menu-container > .menu > .menu-item-has-children').removeClass('menu--open');
                $(this).addClass('menu--open');
            }
        });

        $(document).on('click', '.menu-main-menu-container > .menu > .menu-item-has-children .sub-menu', function (e) {
            e.stopPropagation();
        });

        $(document).on('click', '.header__burger', function (e) {
            const burger = $(this);
            const menu = $('.header--side');

            if (burger.hasClass('burger--open')) {
                burger.toggleClass('burger--open')
                menu.fadeOut();
            } else {
                burger.toggleClass('burger--open');
                menu.fadeIn();
            }
        });
    }

    header();

    function postSliders() {
        $('.js-slider').each(function () {
            let slider = $(this);

            slider.on('init', function () {
                $(window).trigger('heightChanges');
            });

            slider.slick({
                slidesToShow: 3,
                dots: false,
                arrows: true,
                infinite: false,
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                    {
                        breakpoint: 768,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ],
            });

            slider.on('setPosition', function () {
                $(this).find('.card').height('auto');
                var slickTrack = $(this).find('.slick-track');
                var slickTrackHeight = $(slickTrack).height();
                $(this).find('.card').css('height', slickTrackHeight + 'px');
            });
        });
    }

    postSliders();

    function showVideo() {
        $(document).on('click', '.col--video', function () {
            const poster = $(this).find('img');
            const video = $(this).find('video');
            const btn = $(this).find('.play--icon');

            poster.addClass('hidden');
            video.removeClass('hidden');
            btn.addClass('hidden');
        })
    }

    showVideo();

    function toggleCart() {
        $(document).on('click', '.js-cart-open', function () {
            const sideCart = $('.side-cart');

            sideCart.addClass('cart--open');
        })

        $(document).on('click', '.js-cart-close', function () {
            const sideCart = $('.side-cart');

            sideCart.removeClass('cart--open');
        })
    }

    toggleCart();

    function addToCart() {
        $(document).on('click', '.js-add-to-cart', function (e) {
            e.preventDefault();

            var product_id = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: customjs_ajax_object.ajax_url,
                data: {
                    action: 'add_to_cart',
                    product_id: product_id
                },
                success: function (response) {
                    $('.side-cart .side-cart__menu').html(response);

                    $('.side-cart').addClass('cart--open');
                }
            });
        })
    }

    addToCart();

    var isProcessing = false

    function removeFromCart() {
        $(document).on('click', '.remove_from_cart_button', function (e) {
            e.preventDefault();

            if (isProcessing) return;

            isProcessing = true;

            var product_id = $(this).data('product-id');

            $.ajax({
                type: 'POST',
                url: customjs_ajax_object.ajax_url,
                data: {
                    action: 'remove_from_cart',
                    product_id: product_id
                },
                success: function (response) {
                    $('.side-cart .side-cart__menu').html(response);
                },
                complete: function () {
                    isProcessing = false;
                }
            });
        })
    }

    removeFromCart();

    function search() {
        $(document).on('click', '.js-search', function (e) {
            const searchBlock = $(this).closest('.header__search');
            const nav = $('.header__nav');
            const login = $('.header__login');
            const cart = $('.header__cart');

            if (searchBlock.hasClass('is-active')) {
                const form = searchBlock.find('.search-form');

                form.submit();
            } else {
                nav.fadeToggle();
                login.fadeToggle();
                cart.fadeToggle();

                searchBlock.addClass('is-active');
            }
        })

        $(document).on('click', '.search-close', function (e) {
            const searchBlock = $(this).closest('.header__search');
            const nav = $('.header__nav');
            const login = $('.header__login');
            const cart = $('.header__cart');

            nav.fadeToggle();
            login.fadeToggle();
            cart.fadeToggle();

            searchBlock.removeClass('is-active');
        })
    }

    search();
});
