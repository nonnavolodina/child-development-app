jQuery(document).ready(function($) {
    if ($(window).width() < 600) {
        $('.single-activity__sidebar, .single-activity__instructions').hide();
        $('.single-activity__info .btn').click(function() {
            $('.single-activity__sidebar, .single-activity__instructions').slideDown();
        });
        $('.instructions').slick({
            arrows: false,
            dots: true,
            slidesToShow: 1,
            infinite: false,
            adaptiveHeight: true,
        });
    } else {
        $('.instructions').removeClass('slick-initialized');
    }
});