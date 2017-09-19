$(document).ready(function(){

    new WOW().init();

    $('.toggle').on('click', function() {
        $('.container').stop().addClass('active');
    });

    $('.close').on('click', function() {
        $('.container').stop().removeClass('active');
    });

    $('.caption h3').on('mouseenter', function () {

        $(this).addClass('animated pulse');
    });

    $('.caption h3').on('mouseleave', function () {

        $(this).removeClass('animated pulse');
    })
});