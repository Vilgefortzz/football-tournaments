$(function() {

    var timer;

    $(document).on('keyup', '#search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });

    $(document).on('keyup', '#filter-country', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });

    $(document).on('keyup', '#filter-city', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getFootballerCardsSearch(timer, url);
    });
});