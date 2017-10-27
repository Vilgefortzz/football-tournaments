$(function() {

    $(document).on('click', '.propose-extend-contract', function (e) {
        e.preventDefault();
        displayDynamicContentContractExtend($(this));
    });
});

function displayDynamicContentContractExtend(trigger) {

    var urlAfterCreate = $('.contracts-signed').attr('href');
    var url = trigger.attr('href');

    var contractId = trigger.attr('data-contract-id');
    var duration = $('#duration-contract-' + contractId + ' option:selected').text();
    var signature = $('#username-contract-' + contractId).val();

    ajaxExtendContract(url, urlAfterCreate, duration, signature);
}

function ajaxExtendContract(url, urlAfterCreate, duration, signature) {

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

                ajaxContractExtended(urlAfterCreate);
                window.history.pushState("", "", urlAfterCreate);
            }
        }
    });
}

function ajaxContractExtended(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var contractCards = $('.contract-card');

            addAnimation(contractCards, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(contractCards, 'zoomInUp');
            }, 1000);

            $('#loading').hide();
        }
    });
}