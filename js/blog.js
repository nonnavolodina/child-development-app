jQuery(document).ready(function($) {

    if($(window).width() > 768) {
        $('#blog-scroll').click(function() {
            $('html, body').animate({
                scrollTop: $('.archive').offset().top - 60
            }, 300);
        });
    
        var archive = $('.archive').offset().top;
    
        $(window).scroll(function() {
            if($(window).scrollTop() > (archive - 200)) {
                $('#blog-scroll').show();
            } else {
                $('#blog-scroll').hide();
            }
        });
    } 
});