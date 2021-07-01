jQuery(document).ready(function($) {
    $('.faq-accordion__container').click(function() {
        $(this).children('.faq-accordion__answer').slideToggle();
        $(this).toggleClass('faq-accordion__container--open')
    })
});