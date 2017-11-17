$(function() {

    $(document).on('click', '.join-club', function (e) {
        e.preventDefault();

        $(this).prop('disabled', true);

        var url = $(this).attr('href');
        ajaxJoinClubRequest(url);

        addAnimation($(this), 'fadeOut');

        window.setTimeout(function(){
            removeAnimation($(this), 'fadeOut');
        }, 700);
    });
});

function ajaxJoinClubRequest(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
        }
    });
}