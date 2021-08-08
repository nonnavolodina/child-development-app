jQuery(document).ready(function($) {
    // $('#filter').click(function() {
    //     $('.sidebar--desktop').show();
    // });
    // $('.sidebar__label').click(function() {
    //     $('.sidebar--desktop').hide();
    // });

    // $('.widgettitle').click(function() {
    //     $(this).toggleClass('widgettitle--active');
    //     $(this).siblings('ul').slideToggle();
    // });

    $('.mobile-sidebar-button').click(function() {
        $('.sidebar__sub-heading').show();
        $('.searchandfilter ul').show();
        $('.mobile-sidebar-button').hide();
        $('.filter-container').addClass('filter-container--active');
        $('.header').css('display', 'none');
        $('.main').css('background', 'white');
        $('#activities-container').css({
            'visibility': 'hidden',
            'height': '2000px'
        });
        $('.sidebar__heading').css('display', 'none');
    });

    $('.sidebar__sub-heading').click(function() {
        $('.sidebar__sub-heading').hide();
        $('.searchandfilter ul').hide();
        $('.mobile-sidebar-button').show();
        $('.filter-container').removeClass('filter-container--active');
        $('.header').css('display', 'block');
        $('.main').css('background', 'unset');
        $('#activities-container').css({
            'visibility': 'visible',
            'height': '100%'
        });
        $('.sidebar__heading').css('display', 'block');

    });
});