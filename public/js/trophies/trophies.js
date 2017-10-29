$(function() {

    $(document).on('click', '.tab-trophies', function (e) {
        e.preventDefault();

        $('#content-trophies').html('');

        $('.tab-trophies').removeClass('active');
        $(this).addClass('active');

        var url = $(this).attr('href');
        getListWithTrophies(url);
    });
});