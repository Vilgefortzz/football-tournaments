$(function() {

    $(document).on('click', '.leave-tournament', function (e) {
        e.preventDefault();

        $(this).prop('disabled', true);

        var url = $(this).attr('href');
        ajaxLeaveTournamentRequest(url);

        addAnimation($(this), 'fadeOut');

        window.setTimeout(function(){
            removeAnimation($(this), 'fadeOut');
        }, 700);
    });
});

function ajaxLeaveTournamentRequest(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
        }
    });
}