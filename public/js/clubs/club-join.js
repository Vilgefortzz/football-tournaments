$(function() {

    $(document).on('click', '.join-club', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        ajaxJoinRequest(url);

        addAnimation($(this), 'fadeOut');

        window.setTimeout(function(){
            removeAnimation($(this), 'fadeOut');
        }, 700);
    });
});

function ajaxJoinRequest(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function () {
            flashy('Request with try to join the club was sent');
        }
    });
}