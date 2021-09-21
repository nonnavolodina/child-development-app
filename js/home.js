jQuery(document).ready(function($) {
    $('.activities-carousel .activities').slick({
        dots: true,
        infinite: true,
        speed: 300,
        slidesToShow: 1,
        arrows: true,
        adaptiveHeight: true,
        responsive: [
            {
                breakpoint: 769,
                settings: {
                    arrows: false,
                }
            },
            {
                breakpoint: 480,
                settings: {
                    arrows: false,
                    centerMode: true,
                    centerPadding: '5px'
                }
            }
        ]
    });

    $('.fd-root .ff__title').css('display', 'none !important');
});