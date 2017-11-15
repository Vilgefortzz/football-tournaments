$(function() {

    $(document).on('click', '#show-clubs-list, #show-footballers-list, #show-tournaments-list', function (e) {
        e.preventDefault();

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        getListWithData(url);

        $('.search-input').val('');
        $('.search-select').val(0);
        window.history.pushState("", "", url);
    });
});