$(function() {

    $(document).on('click', function () {

        $('.propose-contract-section').fadeOut();
        $('.contract-card').removeClass('chosen');
        $('.footballer-card').removeClass('chosen');
        $('.tournament-card').removeClass('chosen');
        $('.request-to-join-the-club-card').removeClass('chosen');
    });

    $(document).on('click', '.request-to-join-the-club-card', function (e) {
        e.stopPropagation();

        $('.request-to-join-the-club-card').removeClass('chosen');
        $(this).addClass('chosen');
    });

    $(document).on('click', '.contract-card', function (e) {
        e.stopPropagation();

        $('.contract-card').removeClass('chosen');
        $(this).addClass('chosen');
    });

    $(document).on('click', '.footballer-card', function (e) {
        e.stopPropagation();

        $('.footballer-card').removeClass('chosen');
        $(this).addClass('chosen');
    });

    $(document).on('click', '.tournament-card', function (e) {
        e.stopPropagation();

        $('.tournament-card').removeClass('chosen');
        $(this).addClass('chosen');
    });
});