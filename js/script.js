$(window).on('load', function() {
    $('.preloader').fadeOut().end().delay(400).fadeOut('slow');
});

$(window).on('scroll', function() {
    if ($(this).scrollTop() > 200) {
        if (!$('.navbar').hasClass('my-bg-black')) {
            $('.navbar').addClass('my-bg-black');
        }
    } else {
        if ($('.navbar').hasClass('my-bg-black')) {
            $('.navbar').removeClass('my-bg-black');
        }
    }
});