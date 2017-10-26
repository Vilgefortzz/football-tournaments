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

        displayDynamicContent($(this));
    });

    $(document).on('click', '.dynamic-content-card', function () {
        displayDynamicContent($(this));
    });

    $(document).on('click', '#user-waiting-contracts, #club-waiting-contracts, #club-signed-contracts', function () {
        if ($(this).find('.badge').attr('data-number-contracts') !== '0'){
            displayDynamicContent($(this));
        }
        else{
            flashy('There are not any waiting contracts right now');
        }
    });

    $(document).on('click', '.contracts-link', function (e) {
        e.preventDefault();
        displayDynamicContent($(this));
    });

    $(document).on('click', '#requests-to-join-the-club', function () {
        if ($(this).find('.badge').attr('data-number-footballer-requests') !== '0'){
            displayDynamicContent($(this));
        }
        else{
            flashy('You don\'t have any footballer requests');
        }
    });

    $(document).on('click', '#clubs-list,  #footballers-list', function () {
        displayDynamicContentWithSearch($(this));
    });
});

function displayDynamicContent(trigger) {

    $('#content').html('');
    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    ajaxRequestDynamicContent(url);

    window.history.pushState("", "", url);
}

function displayDynamicContentWithSearch(trigger) {

    $('#content').html('');
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
            var requestToJoinTheClubCards = $('.request-to-join-the-club-card');
            var jumbotrons = $('.jumbotron');
            var paginations = $('.pagination-links');

            addAnimation(menuCards, 'zoomInUp');
            addAnimation(contractCards, 'zoomInUp');
            addAnimation(requestToJoinTheClubCards, 'zoomInUp');
            addAnimation(jumbotrons, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(menuCards, 'zoomInUp');
                removeAnimation(contractCards, 'zoomInUp');
                removeAnimation(requestToJoinTheClubCards, 'zoomInUp');
                removeAnimation(jumbotrons, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 1000);

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
            }, 1000);

            $('#loading').hide();
        }
    });
}