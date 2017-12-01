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

    $(document).on('click', '.dynamic-content', function () {
        displayDynamicContent($(this));
    });

    $(document).on('click', '#footballer-waiting-contracts, #club-waiting-contracts,' +
        ' #club-signed-contracts, #club-extension-proposed-contracts,' +
        ' #club-open-tournaments, #club-ongoing-tournaments, #club-closed-tournaments,' +
        ' #organizer-ongoing-tournaments, #organizer-closed-tournaments', function () {
        if ($(this).find('.badge').attr('data-number-items') !== '0'){
            displayDynamicContent($(this));
        }
        else{
            flashy('There are not any items right now');
        }
    });

    $(document).on('click', '#organizer-create-tournament', function () {
        displayDynamicContentWithDateTimePickers($(this));
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

    $(document).on('click', '#tournaments-list', function () {
        displayDynamicContentWithSearchAndDateTimePickers($(this));
    });

    $(document).on('click', '.tournament-card', function () {
        displayDynamicContentWithTournamentTreeInit($(this));
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

function displayDynamicContentWithDateTimePickers(trigger) {

    $('#content').html('');
    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    ajaxRequestDynamicContentWithDateTimePickers(url);

    window.history.pushState("", "", url);
}

function displayDynamicContentWithSearchAndDateTimePickers(trigger) {

    $('#content').html('');
    $('#loading').css('display', 'block');

    var url = trigger.attr('href');

    ajaxRequestDynamicContentWithSearchAndDateTimePickers(url);

    window.history.pushState("", "", url);
}

function displayDynamicContentWithTournamentTreeInit(trigger) {

    $('#content').html('');
    $('#loading').css('display', 'block');

    var mainUrl = trigger.attr('href');
    var treeViewUrl = trigger.data('tournament-tree-url');

    ajaxRequestDynamicContentWithTournamentTreeInit(mainUrl, treeViewUrl);

    window.history.pushState("", "", mainUrl);
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
            var tournamentCards = $('.tournament-card');
            var jumbotrons = $('.jumbotron');
            var paginations = $('.pagination-links');

            addAnimation(menuCards, 'zoomInUp');
            addAnimation(contractCards, 'zoomInUp');
            addAnimation(requestToJoinTheClubCards, 'zoomInUp');
            addAnimation(tournamentCards, 'zoomInUp');
            addAnimation(jumbotrons, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(menuCards, 'zoomInUp');
                removeAnimation(contractCards, 'zoomInUp');
                removeAnimation(requestToJoinTheClubCards, 'zoomInUp');
                removeAnimation(tournamentCards, 'zoomInUp');
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

function ajaxRequestDynamicContentWithDateTimePickers(url) {

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

            // Date time pickers - init
            $('.start-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time : false});
            $('.end-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time: false});

            $('.start-date')
                .on('change', function(e, date) {

                    $('#tournament-end-date-section').fadeIn('slow');
                    $('.end-date').bootstrapMaterialDatePicker('setMinDate', date);
                });

            $('#loading').hide();
        }
    });
}

function ajaxRequestDynamicContentWithSearchAndDateTimePickers(url) {

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

            // Date time pickers - init
            $('.start-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time : false});
            $('.end-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time: false});

            $('.start-date')
                .on('change', function(e, date) {

                    $('.end-date').bootstrapMaterialDatePicker('setMinDate', date);
                });

            $('#loading').hide();
        }
    });
}

function ajaxRequestDynamicContentWithTournamentTreeInit(mainUrl, treeViewUrl) {

    $.ajax({
        type: "GET",
        url: mainUrl,
        cache: false,

        success: function (data) {

            $('#content').html(data);

            var jumbotrons = $('.jumbotron');

            addAnimation(jumbotrons, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(jumbotrons, 'zoomInUp');
            }, 1000);

            generateTournamentTree(treeViewUrl);

            $('#loading').hide();
        }
    });
}
