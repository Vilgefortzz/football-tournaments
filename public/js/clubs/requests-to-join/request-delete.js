$(function() {

    $(document).on('click', '.delete-request-to-join-the-club', function (e) {
        e.preventDefault();
        dynamicContentDeleteRequestToJoinTheClub($(this));
    });
});

function dynamicContentDeleteRequestToJoinTheClub(trigger) {

    $('#content').html('');
    $('#loading').css('display', 'block');

    var urlAfterDelete = $('.requests-to-join-the-club').attr('href');
    var url = trigger.attr('href');

    deleteRequestToJoinTheClub(url, urlAfterDelete);
    window.history.pushState("", "", urlAfterDelete);
}

function deleteRequestToJoinTheClub(url, urlAfterDelete) {

    $.ajax({
        type: 'DELETE',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
            getRequestToJoinTheClubCards(urlAfterDelete);
        }
    });
}

function getRequestToJoinTheClubCards(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var requestToJoinTheClubCards = $('.request-to-join-the-club-card');
            var paginations = $('.pagination-links');

            addAnimation(requestToJoinTheClubCards, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(requestToJoinTheClubCards, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 1000);

            $('#loading').hide();
        }
    });
}