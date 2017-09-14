$(function () {

    $('.tile').on('click', function () {

        $('.tile').not($(this)).hide();
        $(this).addClass('chosen');
        $(this).addClass('animated zoomInUp');
    });
});