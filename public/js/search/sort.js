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

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        var sortBy = $(this).attr('data-sort-by');
        var direction = $(this).attr('data-direction');
        var sortOptions = $('.btn-circle-sort');

        sortOptions.attr('data-direction', 'asc');

        $('.direction').hide();

        if (direction === 'asc'){
            $(this).find('.asc').show();
            $(this).attr('data-direction', 'desc');
            $(this).attr('data-direction-current', 'asc');
        }
        else {
            $(this).find('.desc').show();
            $(this).attr('data-direction', 'asc');
            $(this).attr('data-direction-current', 'desc');
        }

        getListWithData(url, sortBy, direction);

        $('.search-input').val('');
        $('.search-select').val(0);
        sortOptions.removeClass('active-sort');
        $(this).addClass('active-sort');
        window.history.pushState("", "", url);
    });
});