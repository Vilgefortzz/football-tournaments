$(function() {

    $(document).on('click', '.propose-contract', function (e) {
        e.preventDefault();

        var requestToJoinTheClubId = $(this).attr('data-request-to-join-the-club-id');
        $('#username-request-to-join-the-club-' + requestToJoinTheClubId).val('');
        $('#propose-contract-' + requestToJoinTheClubId).show();
    });

    $(document).on('click', '.create-contract', function (e) {
        e.preventDefault();
        displayDynamicContentContractCreate($(this));
    });
});

function displayDynamicContentContractCreate(trigger) {

    var urlAfterCreate = $('.requests-to-join-the-club').attr('href');
    var url = trigger.attr('href');

    var requestToJoinTheClubId = trigger.attr('data-request-to-join-the-club-id');
    var duration = $('#duration-request-to-join-the-club-' + requestToJoinTheClubId + ' option:selected').text();
    var signature = $('#username-request-to-join-the-club-' + requestToJoinTheClubId).val();

    $('#content').html('');
    $('#loading').css('display', 'block');
    ajaxCreateContractRequest(url, urlAfterCreate, duration, signature);
}

function ajaxCreateContractRequest(url, urlAfterCreate, duration, signature) {

    $.ajax({
        type: 'POST',
        url: url,
        data: {duration: duration, signature: signature},
        cache: false,

        success: function (data) {
            flashy(data.message);

            ajaxRequestContractCreated(urlAfterCreate);
            window.history.pushState("", "", urlAfterCreate);
        }
    });
}

function ajaxRequestContractCreated(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var requestToJoinTheClubCards = $('.request-to-join-the-club-card');

            addAnimation(requestToJoinTheClubCards, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(requestToJoinTheClubCards, 'zoomInUp');
            }, 1000);

            $('#loading').hide();
        }
    });
}