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
});