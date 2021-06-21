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
                    adaptiveHeight: false,
                    centerMode: true,
                    centerPadding: '10px'
                }
            },
            {
                breakpoint: 376,
                settings: {
                    arrows: false,
                    adaptiveHeight: false,
                    centerMode: true,
                    centerPadding: '5px'
                }
            }
        ]
    });
});