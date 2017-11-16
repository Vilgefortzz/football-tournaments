$(function() {

    $(document).on('click', '#show-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#hide-filters').fadeIn();
        $('.search-filter').fadeIn();
    });

    $(document).on('click', '#hide-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#show-filters').fadeIn();
        $('.search-filter').fadeOut();
    });

    $(document).on('click', '#show-location-time-filters', function (e) {
        e.preventDefault();

        $('.btn-circle-filter-tournaments').hide();
        $('#hide-location-time-filters').fadeIn();
        $('.search-filter-location-time').fadeIn();
    });

    $(document).on('click', '#hide-location-time-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('.btn-circle-filter-tournaments').fadeIn();
        $('#show-location-time-filters').fadeIn();
        $('.search-filter-location-time').fadeOut();
    });

    $(document).on('click', '#show-game-system-points-filters', function (e) {
        e.preventDefault();

        $('.btn-circle-filter-tournaments').hide();
        $('#hide-game-system-points-filters').fadeIn();
        $('.search-filter-game-system-points').fadeIn();
    });

    $(document).on('click', '#hide-game-system-points-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('.btn-circle-filter-tournaments').fadeIn();
        $('#show-game-system-points-filters').fadeIn();
        $('.search-filter-game-system-points').fadeOut();
    });

    $(document).on('click', '#show-seats-status-filters', function (e) {
        e.preventDefault();

        $('.btn-circle-filter-tournaments').hide();
        $('#hide-seats-status-filters').fadeIn();
        $('.search-filter-seats-status').fadeIn();
    });

    $(document).on('click', '#hide-seats-status-filters', function (e) {
        e.preventDefault();

        $(this).hide();
        $('.btn-circle-filter-tournaments').fadeIn();
        $('#show-seats-status-filters').fadeIn();
        $('.search-filter-seats-status').fadeOut();
    });
});