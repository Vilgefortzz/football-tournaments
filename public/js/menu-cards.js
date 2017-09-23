$(function () {

    /*
    Handle back button in browser - dynamic loaded content
     */
    if (window.history && window.history.pushState) {

        $(window).on('popstate', function() {
            location.reload();
        });
    }

    $(document).on('click', '.menu-link', function (e) {
        e.preventDefault();

        $('.navbar-nav > .nav-item').removeClass('active');
        $(this).parent().addClass('active');

        displayDynamicContent($(this), $('.menu-card'), $('.jumbotron'));

    });

    $(document).on('click', '.menu-card', function () {
        displayDynamicContent($(this), $('.menu-card'), $('.jumbotron'));
    });
});

function displayDynamicContent(trigger, tiles, jumbotrons) {

    if (tiles !== undefined) {
        tiles.hide();
    }

    if (jumbotrons !== undefined) {
        jumbotrons.hide();
    }

    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    handleAjaxRequest(url);

    window.history.pushState("", "", url);
}

function handleAjaxRequest(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var menuCards = $('.menu-card');
            var jumbotrons = $('.jumbotron');

            addAnimation(menuCards, 'zoomInUp');
            addAnimation(jumbotrons, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(menuCards, 'zoomInUp');
                removeAnimation(jumbotrons, 'zoomInUp');
            }, 800);

            $('#loading').hide();
        }
    });
}