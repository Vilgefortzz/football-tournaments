$(function() {

    $(document).on('click', '.add-football-position-button', function (e) {
        e.preventDefault();

        $(this).removeClass('add-football-position-button').addClass('add-football-position');
        $(this).find('i').removeClass('fa-plus').addClass('fa-check');
        $('#football-positions').fadeIn();
    });

    $(document).on('click', '.add-football-position', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        ajaxAddFootballPosition(url);
    });

    $(document).on('click', '.delete-football-position', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        ajaxDeleteFootballPosition(url);

        $(this).fadeOut();
    });
});

function ajaxAddFootballPosition(url) {

    var footballerFootballPositionValue = $('#football-positions').val();

    $.ajax({
        type: 'POST',
        url: url,
        data: {footballerFootballPositionValue: footballerFootballPositionValue},
        cache: false,

        success: function (data) {
            flashy(data.message);

            if (data.completed){

                var addFootballPositionButton = $('.add-football-position');
                var footballPositions = $('#preferred-football-positions');

                footballPositions.data('number-football-positions', footballPositions.data('number-football-positions') + 1);

                if (footballPositions.data('number-football-positions') === 3){

                    addFootballPositionButton.removeClass('add-football-position').addClass('add-football-position-button');
                    addFootballPositionButton.find('i').removeClass('fa-check').addClass('fa-plus');
                    addFootballPositionButton.fadeOut();
                    $('#football-positions').fadeOut();

                    $('#football-positions-added').append(data.userFootballPosition);
                }
                else{
                    addFootballPositionButton.removeClass('add-football-position').addClass('add-football-position-button');
                    addFootballPositionButton.find('i').removeClass('fa-check').addClass('fa-plus');
                    $('#football-positions').fadeOut();

                    $('#football-positions-added').append(data.userFootballPosition);
                }
            }
        }
    });
}

function ajaxDeleteFootballPosition(url) {

    $.ajax({
        type: 'DELETE',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);

            var addFootballPositionButton = $('.add-football-position-button');
            var footballPositions = $('#preferred-football-positions');

            footballPositions.data('number-football-positions', footballPositions.data('number-football-positions') - 1);
            addFootballPositionButton.fadeIn();
        }
    });
}
