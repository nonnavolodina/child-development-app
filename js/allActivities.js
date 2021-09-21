jQuery(document).ready(function($) {
    $('.sf-field-taxonomy-material h4').click(function() {
        $(this).siblings('ul').slideToggle();
        $(this).toggleClass('hidden');
    });

    $('.sf-field-taxonomy-skills h4').click(function() {
        $(this).siblings('ul').slideToggle();
        $(this).toggleClass('hidden');
    });

    $('.sf-field-taxonomy-age h4').click(function() {
        $(this).siblings('ul').slideToggle();
        $(this).toggleClass('hidden');
    });

    $('.sf-field-taxonomy-subject h4').click(function() {
        $(this).siblings('ul').slideToggle();
        $(this).toggleClass('hidden');
    });

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

    if($(window).width() > 768) {
        $('#activity-scroll').click(function() {
            $('html, body').animate({scrollTop: '0px'}, 300);
        })
    
        $(window).scroll(function() {
            if($(window).scrollTop() > 200) {
                $('#activity-scroll').show();
            } else {
                $('#activity-scroll').hide();
            }
         });
    }
});