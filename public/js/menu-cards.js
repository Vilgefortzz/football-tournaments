$(function () {

    /*
    Handle back button in browser - dynamic loaded content
     */
    if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
            displayBackDynamicContent($('#previous-url').attr('data-previous-url'));
        });
    }

    $(document).on('click', '.tile', function () {
        displayDynamicContent($(this), $('.tile'));
    });
});

function displayDynamicContent(trigger, tiles) {

    $('#loading').css('display', 'block');

    tiles.hide();
    var url = trigger.attr('href');

    handleAjaxRequest(url);

    $('#previous-url').attr('data-previous-url', window.location.href);
    window.history.pushState("", "", url);
}

function displayBackDynamicContent(url) {

    $('#loading').css('display', 'block');

    handleAjaxRequest(url);

    window.history.pushState("", "", url);
    $('#previous-url').attr('data-previous-url', $('#previous-url').attr('data-prev-previous-url'));
}

function handleAjaxRequest(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);
            $('.tile').addClass('animated zoomInUp');
            $('.jumbotron').addClass('animated zoomInUp');

            window.setTimeout(function(){
                removeAnimation();
            }, 800);

            $('#loading').hide();
        }
    });
}

function removeAnimation() {
    $('.tile').removeClass('animated zoomInUp');
    $('.jumbotron').removeClass('animated zoomInUp');
}