jQuery(document).ready(function($) {
    $('#filter').click(function() {
        $('.sidebar--desktop').show();
    });
    $('.sidebar__label').click(function() {
        $('.sidebar--desktop').hide();
    });

    $('.widgettitle').click(function() {
        $(this).toggleClass('widgettitle--active');
        $(this).siblings('ul').slideToggle();
    });
});