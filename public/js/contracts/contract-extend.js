$(function() {

    $(document).on('click', '.propose-extend-contract', function (e) {
        e.preventDefault();
        displayDynamicContentExtensionPropositionsForContracts($(this));
    });

    $(document).on('click', '.extend-contract', function (e) {
        e.preventDefault();
        displayDynamicContentExtendContract($(this));
    });

    $(document).on('click', '.reject-extend-contract', function (e) {
        e.preventDefault();
        ajaxRejectContractExtension($(this).attr('href'));
    });
});

function displayDynamicContentExtensionPropositionsForContracts(trigger) {

    var urlAfterCreate = $('.contracts-signed').attr('href');
    var url = trigger.attr('href');

    var contractId = trigger.attr('data-contract-id');
    var duration = $('#duration-contract-' + contractId + ' option:selected').text();
    var signature = $('#username-contract-' + contractId).val();

    ajaxExtensionProposedForContract(url, urlAfterCreate, duration, signature);
}

function displayDynamicContentExtendContract(trigger) {

    var urlAfterExtension = $('.contract-binding').attr('href');
    var url = trigger.attr('href');

    ajaxExtendContract(url, urlAfterExtension);
}


function ajaxExtensionProposedForContract(url, urlAfterCreate, duration, signature) {

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

                ajaxExtensionProposed(urlAfterCreate);
                window.history.pushState("", "", urlAfterCreate);
            }
        }
    });
}

function ajaxExtendContract(url, urlAfterExtension) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (data) {
            flashy(data);

            $('#content').html('');
            $('#loading').css('display', 'block');

            ajaxContractExtended(urlAfterExtension);
            window.history.pushState("", "", urlAfterExtension);
        }
    });
}

function ajaxRejectContractExtension(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function (data) {
            flashy(data);
            $('.extend-contract-box').fadeOut();
        }
    });
}

function ajaxExtensionProposed(url) {

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

function ajaxContractExtended(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var jumbotrons = $('.jumbotron');

            addAnimation(jumbotrons, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(jumbotrons, 'zoomInUp');
            }, 1000);

            $('#loading').hide();
        }
    });
}