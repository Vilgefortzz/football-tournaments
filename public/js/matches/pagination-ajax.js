$(function() {

    $(document).on('click', '.pagination-matches-list a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getListWithMatches(url);
    });
});