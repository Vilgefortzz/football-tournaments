$(function() {

    var timer;

    $(document).on('keyup', '#tournaments-search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-start-date', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-end-date', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('keyup', '#tournaments-filter-country', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('keyup', '#tournaments-filter-city', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-min-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-max-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-number-of-seats', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-game-system', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });

    $(document).on('change', '#tournaments-filter-status', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getTournamentCardsSearch(timer, url);
    });
});