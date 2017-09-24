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

        displayDynamicContent($(this), $('.menu-card'), $('.contract-card'), $('.jumbotron'), $('.pagination-links'));
    });

    $(document).on('click', '.menu-card', function () {
        displayDynamicContent($(this), $('.menu-card'), $('.contract-card'), $('.jumbotron'), $('.pagination-links'));
    });
});

function displayDynamicContent(trigger, menuCards, contractCards, jumbotrons, paginations) {

    if (menuCards !== undefined) {
        menuCards.hide();
    }

    if (contractCards !== undefined) {
        contractCards.hide();
    }

    if (jumbotrons !== undefined) {
        jumbotrons.hide();
    }

    if (paginations !== undefined) {
        paginations.hide();
    }

    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    handleAjaxRequestMenuCards(url);

    window.history.pushState("", "", url);
}

function handleAjaxRequestMenuCards(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var menuCards = $('.menu-card');
            var contractCards = $('.contract-card');
            var jumbotrons = $('.jumbotron');
            var paginations = $('.pagination-links');

            addAnimation(menuCards, 'zoomInUp');
            addAnimation(contractCards, 'zoomInUp');
            addAnimation(jumbotrons, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(menuCards, 'zoomInUp');
                removeAnimation(contractCards, 'zoomInUp');
                removeAnimation(jumbotrons, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 800);

            $('#loading').hide();
        }
    });
}