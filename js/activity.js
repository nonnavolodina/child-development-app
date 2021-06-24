jQuery(document).ready(function($) {
    if($(window).width() < 600) {
        $('.single-activity__sidebar').hide();
        $('.single-activity__instructions-heading').hide();
        $('.single-activity__info .btn').click(function() {
            $('.single-activity__sidebar').show();
            $('.single-activity__instructions-heading').show();
            $('.instructions--mobile').css({
                'visibility': 'visible',
                'height' : 'auto'
            });
        });
        $('.instructions--mobile').slick({
            slidesToShow: 1,
            arrows: false,
            dots: true,
            infinite: false,
            adaptiveHeight: true,
        });
    }
});