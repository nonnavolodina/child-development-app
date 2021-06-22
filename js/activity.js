jQuery(document).ready(function($) {
    $('.single-activity__sidebar, .single-activity__instructions').hide();
    $('.single-activity__info .btn').click(function() {
        $('.single-activity__sidebar, .single-activity__instructions').slideDown();
    });
    $('.instructions--mobile').slick({
        arrows: false,
        dots: true,
        slidesToShow: 1,
        infinite: false,
        // adaptiveHeight: true,
    });
});