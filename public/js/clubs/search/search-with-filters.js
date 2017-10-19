$(function() {

    var timer;

    $(document).on('keyup', '#clubs-search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('keyup', '#clubs-filter-country', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('keyup', '#clubs-filter-city', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('change', '#clubs-filter-min-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('change', '#clubs-filter-max-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });
});