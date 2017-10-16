$(function() {

    var timer;

    $(document).on('keyup', '#search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('keyup', '#filter-country', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('keyup', '#filter-city', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('change', '#filter-min-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('change', '#filter-max-rating', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });
});