$(function() {

    $(document).on('click', '.close-tournament', function (e) {
        e.preventDefault();

        $(this).prop('disabled', true);

        $('#content-matches').html('');
        $('.tab-matches').removeClass('active');

        $('#tab-matches').removeClass('active');
        $('#tab-main-2').removeClass('active');
        $('#tab-matches').text('Matches');

        $('#tab-tournament-tree').addClass('active');
        $('#tab-main-1').addClass('active');

        var url = $(this).attr('href');
        ajaxCloseTournamentRequest(url);

        addAnimation($(this), 'fadeOut');

        window.setTimeout(function(){
            removeAnimation($(this), 'fadeOut');
        }, 700);
    });
});

function ajaxCloseTournamentRequest(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
        }
    });
}