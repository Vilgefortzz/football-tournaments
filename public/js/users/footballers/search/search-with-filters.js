$(function() {

    var timer;

    $(document).on('keyup', '#footballers-search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });

    $(document).on('keyup', '#footballers-filter-country', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });

    $(document).on('keyup', '#footballers-filter-city', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });
});