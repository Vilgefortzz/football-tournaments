$(function() {

    $(document).on('click', '.join-tournament', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        ajaxJoinTournamentRequest(url);

        addAnimation($(this), 'fadeOut');

        window.setTimeout(function(){
            removeAnimation($(this), 'fadeOut');
        }, 700);
    });
});

function ajaxJoinTournamentRequest(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
        }
    });
}