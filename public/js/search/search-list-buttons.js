$(function() {

    $(document).on('click', '#show-club-list, #show-footballers-list', function (e) {
        e.preventDefault();

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        getListWithData(url);

        $('.search-input').val('');
        window.history.pushState("", "", url);
    });
});