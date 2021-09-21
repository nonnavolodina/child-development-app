jQuery(document).ready(function($) {
    // var containerWidth = $('.header__nav').width();
    $('.hamburger').click(function() {
        $('.menu-primary-menu-logged-out-container').toggleClass('menu-primary-menu-logged-out-container--active');
        $('.menu-primary-nav-logged-in-container').toggleClass('menu-primary-nav-logged-in-container--active');
        $('.hamburger').toggleClass('hamburger--open');
        $('.header__nav ').toggleClass('header__nav--mobile');
        $('.header').toggleClass('header--mobile');
        $('.main').toggleClass('main--mobile');
        $('.footer').toggleClass('footer--mobile');
        // if ($(window).width() < 769) {
        //     $('.menu-primary-menu-logged-out-container > ul').css('width', containerWidth);
        //     $('.menu-primary-nav-logged-in-container > ul').css('width', containerWidth);
        // }
    });

    $(window).scroll(function (event) {
        var scroll = $(window).scrollTop();
        if(scroll > 0) {
            $('.header').addClass('header--fixed');
        }
        else if(scroll == 0) {
            $('.header').removeClass('header--fixed');
        }
    });

    var scroll = $(window).scrollTop();
    if(scroll > 0) {
        $('.header').addClass('header--fixed');
    }
    else if(scroll == 0) {
        $('.header').removeClass('header--fixed');
    }
});