$(function() {

    $(document).on('click', '.delete-contract', function (e) {
        e.preventDefault();
        displayDynamicContentContractDelete($(this), $('.contract-card'), $('.pagination-links'));
    });
});

function displayDynamicContentContractDelete(trigger, contractCards, paginations) {

    if (contractCards !== undefined) {
        contractCards.hide();
    }

    if (paginations !== undefined) {
        paginations.hide();
    }

    $('#loading').css('display', 'block');

    var urlAfterDelete = $('.contract-card').attr('href');
    var url = trigger.attr('href');

    handleAjaxDeleteRequest(url, urlAfterDelete);

    window.history.pushState("", "", urlAfterDelete);
}

function handleAjaxDeleteRequest(url, urlAfterDelete) {

    $.ajax({
        type: 'DELETE',
        url: url,
        cache: false,

        success: function (message) {
            flashy(message);
            handleAjaxRequestContractCards(urlAfterDelete);
        }
    });
}

function handleAjaxRequestContractCards(url) {

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
            }, 800);

            $('#loading').hide();
        }
    });
}