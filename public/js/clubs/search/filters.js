$(function() {

    $(document).on('click', '#show-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#hide-filters').fadeIn();
        $('.search-filter-text').fadeIn();
        $('.search-filter-number').fadeIn();
    });

    $(document).on('click', '#hide-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#show-filters').fadeIn();
        $('.search-filter-text').fadeOut();
        $('.search-filter-number').fadeOut();
    });

    var timer;

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