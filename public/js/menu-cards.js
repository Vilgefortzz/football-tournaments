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

    $(document).on('click', '.dynamic-content-card', function () {
        displayDynamicContent($(this), $('.menu-card'), $('.contract-card'), $('.jumbotron'), $('.pagination-links'));
    });

    $(document).on('click', '#waiting-contracts', function () {
        if ($(this).find('.badge').attr('data-number-waiting-contracts') !== '0'){
            displayDynamicContent($(this), $('.menu-card'), $('.contract-card'), $('.jumbotron'), $('.pagination-links'));
        }
        else{
            flashy('You don\'t have any waiting contracts');
        }
    });

    $(document).on('click', '#clubs-list', function () {
        displayDynamicContentWithSearch($(this), $('.menu-card'));
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

    ajaxRequestDynamicContent(url);

    window.history.pushState("", "", url);
}

function displayDynamicContentWithSearch(trigger, menuCards) {

    if (menuCards !== undefined) {
        menuCards.hide();
    }

    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    ajaxRequestDynamicContentWithSearch(url);

    window.history.pushState("", "", url);
}

function ajaxRequestDynamicContent(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            if (!isEmpty($('#content-search'))){
                $('#content-search').empty();
            }

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

function ajaxRequestDynamicContentWithSearch(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content-search').html(data.search);
            $('#content').html(data.list);

            var jumbotrons = $('.jumbotron');
            var paginations = $('.pagination-links');

            addAnimation(jumbotrons, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(jumbotrons, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 800);

            $('#loading').hide();
        }
    });
}

function isEmpty(el){
    return !$.trim(el.html())
}