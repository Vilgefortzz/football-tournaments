$(function() {

    $(document).on('click', '.propose-contract-request-to-join-the-club', function (e) {
        e.preventDefault();

        var requestToJoinTheClubId = $(this).attr('data-request-to-join-the-club-id');
        $('#username-request-to-join-the-club-' + requestToJoinTheClubId).val('');
        $('#propose-contract-request-to-join-the-club-' + requestToJoinTheClubId).show();
    });

    $(document).on('click', '.propose-contract-footballer', function (e) {
        e.preventDefault();

        var footballerId = $(this).attr('data-footballer-id');
        $('#username-footballer-' + footballerId).val('');
        $('#propose-contract-footballer-' + footballerId).show();
    });

    $(document).on('click', '.create-contract-request-to-join-the-club', function (e) {
        e.preventDefault();
        displayDynamicContentContractCreateForRequestToJoinTheClub($(this));
    });

    $(document).on('click', '.create-contract-footballer', function (e) {
        e.preventDefault();
        displayDynamicContentContractCreateForFootballer($(this));
    });
});

function displayDynamicContentContractCreateForRequestToJoinTheClub(trigger) {

    var urlAfterCreate = $('.requests-to-join-the-club').attr('href');
    var url = trigger.attr('href');

    var requestToJoinTheClubId = trigger.attr('data-request-to-join-the-club-id');
    var duration = $('#duration-request-to-join-the-club-' + requestToJoinTheClubId + ' option:selected').text();
    var signature = $('#username-request-to-join-the-club-' + requestToJoinTheClubId).val();

    ajaxCreateContractForRequestToJoinTheClub(url, urlAfterCreate, duration, signature);
}

function displayDynamicContentContractCreateForFootballer(trigger) {

    var urlAfterCreate = $('.footballers-list').attr('href');
    var url = trigger.attr('href');

    var footballerId = trigger.attr('data-footballer-id');
    var duration = $('#duration-footballer-' + footballerId + ' option:selected').text();
    var signature = $('#username-footballer-' + footballerId).val();

    ajaxCreateContractForFootballer(url, urlAfterCreate, duration, signature);
}

function ajaxCreateContractForRequestToJoinTheClub(url, urlAfterCreate, duration, signature) {

    $.ajax({
        type: 'POST',
        url: url,
        data: {duration: duration, signature: signature},
        cache: false,

        success: function (data) {
            flashy(data.message);

            if (data.completed){
                $('#content').html('');
                $('#loading').css('display', 'block');

                ajaxContractCreatedForRequestToJoinTheClub(urlAfterCreate);
                window.history.pushState("", "", urlAfterCreate);
            }
        }
    });
}

function ajaxCreateContractForFootballer(url, urlAfterCreate, duration, signature) {

    $.ajax({
        type: 'POST',
        url: url,
        data: {duration: duration, signature: signature},
        cache: false,

        success: function (data) {
            flashy(data.message);

            if (data.completed){
                $('#content').html('');
                $('#loading').css('display', 'block');

                ajaxContractCreatedForFootballer(urlAfterCreate);
                window.history.pushState("", "", urlAfterCreate);
            }
        }
    });
}

function ajaxContractCreatedForRequestToJoinTheClub(url) {

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

function ajaxContractCreatedForFootballer(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#footballers-search-main').val('');
            $('#content').html(data.list);

            var table = $('.table');

            addAnimation(table, 'fadeIn');

            window.setTimeout(function(){
                removeAnimation(table, 'fadeIn');
            }, 800);

            $('#loading').hide();
        }
    });
}