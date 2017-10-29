$(function() {

    $(document).on('click', '.pagination-trophies-list a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getListWithTrophies(url);
    });
});