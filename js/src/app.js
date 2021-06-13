jQuery(document).ready(function($) {
    $('.activities-carousel .activities').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        arrows: true,
        adaptiveHeight: true
    });
});