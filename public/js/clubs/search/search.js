$(function() {

    var timer;

    $(document).on('keyup', '#search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        timer = getClubCardsSearch(timer, url);
    });

    $(document).on('click', '#show-club-list', function (e) {
        e.preventDefault();

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        getClubs(url);

        $('.search-input').val('');
    });
});