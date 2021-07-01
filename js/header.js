jQuery(document).ready(function($) {
    var containerWidth = $('.header__nav').width();
    $('.hamburger').click(function() {
        $('.menu-primary-menu-logged-out-container').toggleClass('menu-primary-menu-logged-out-container--active');
        $('.hamburger').toggleClass('hamburger--open');
        $('.header__nav ').toggleClass('header__nav--mobile');
        $('.header').toggleClass('header--mobile');
        $('.main').toggleClass('main--mobile');
        $('.footer').toggleClass('footer--mobile');
        if ($(window).width() < 769) {
            $('.menu-primary-menu-logged-out-container > ul').css('width', containerWidth);
        }
    });
});