$(function() {

    $(document).on('click', '#show-sort-options', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#hide-sort-options').fadeIn();

        $('.search-sort-option-text').fadeIn();
    });

    $(document).on('click', '#hide-sort-options', function (e) {
        e.preventDefault();

        $(this).hide();
        $('#show-sort-options').fadeIn();
        $('.search-sort-option-text').fadeOut();
    });

    $(document).on('click', '.btn-circle-sort', function (e) {
        e.preventDefault();

        $('.btn-circle-sort').removeClass('active-sort');
        $(this).addClass('active-sort');
    });
});