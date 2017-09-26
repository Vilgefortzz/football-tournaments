$(function() {

    $(document).on('click', '.sign-contract', function (e) {
        e.preventDefault();
        displayDynamicContentContractSign($(this), $('.contract-card'), $('.pagination-links'));
    });
});

function displayDynamicContentContractSign(trigger, contractCards, paginations) {

    if (contractCards !== undefined) {
        contractCards.hide();
    }

    if (paginations !== undefined) {
        paginations.hide();
    }

    var urlAfterFailed = $('.contract-card').attr('href');
    var urlAfterSign = $('.contract-binding').attr('href');
    var url = trigger.attr('href');

    var contractId = trigger.attr('data-contract-id');
    var signature = $('#username-contract-' + contractId).val();

    handleAjaxSignRequest(url, urlAfterSign, urlAfterFailed, signature);
}

function handleAjaxSignRequest(url, urlAfterSign, urlAfterFailed, signature) {

    $.ajax({
        type: 'POST',
        url: url,
        data: {signature: signature},
        cache: false,

        success: function (data) {
            flashy(data.message);

            if(data.completed){
                $('#contract-sign-loading').css('display', 'block');
                handleAjaxRequestCompleted(urlAfterSign);
                window.history.pushState("", "", urlAfterSign);
            }
            else{
                $('#loading').css('display', 'block');
                handleAjaxRequestFailed(urlAfterFailed);
                window.history.pushState("", "", urlAfterFailed);
            }

        }
    });
}

function handleAjaxRequestCompleted(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            setTimeout(function() {
                $('#contract-sign-loading').hide();

                $('#content').html(data);

                var jumbotrons = $('.jumbotron');

                addAnimation(jumbotrons, 'zoomInUp');

                window.setTimeout(function(){
                    removeAnimation(jumbotrons, 'zoomInUp');
                }, 1500);
            }, 5000);
        }
    });
}

function handleAjaxRequestFailed(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var contractCards = $('.contract-card');
            var paginations = $('.pagination-links');

            addAnimation(contractCards, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(contractCards, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 1500);

            $('#loading').hide();
        }
    });
}