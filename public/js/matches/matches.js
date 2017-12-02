$(function() {

    $(document).on('click', '.tab-matches', function (e) {
        e.preventDefault();

        $('#content-matches').html('');

        $('.tab-matches').removeClass('active');
        $(this).addClass('active');

        var url = $(this).attr('href');
        getListWithMatches(url);
    });
});