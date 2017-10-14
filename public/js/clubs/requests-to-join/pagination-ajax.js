$(function() {

    $(document).on('click', '.pagination-requests-to-join a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getJoinRequests(url);
        window.history.pushState("", "", url);
    });
});

function getJoinRequests(url) {

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,

        success: function(data){

            $('#content').html(data);

            var requestToJoinTheClubCards = $('.request-to-join-the-club-card');

            addAnimation(requestToJoinTheClubCards, 'pulse');

            window.setTimeout(function(){
                removeAnimation(requestToJoinTheClubCards, 'pulse');
            }, 800);
        }
    });
}