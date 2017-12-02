$(function () {

    $(document).on('click', '#user-delete', function () {
        $('#user-delete-form').submit();
    });
});

// Functions

function addAnimation(object, animation) {
    object.addClass('animated ' + animation);
}

function removeAnimation(object, animation) {
    object.removeClass('animated ' + animation);
}

function generateTournamentTree(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            var teams = [];
            var results = [];

            for (var i=0; i<( data.numberOfRounds + 1 ); i++){

                results.push([]);
            }

            for (var j=0; j<data.numberOfFirstRoundMatches; j++){

                var tmpTeams = [];
                tmpTeams.push(data.matches[j].first_club);
                tmpTeams.push(data.matches[j].second_club);

                teams.push(tmpTeams);
            }

            for (var k=0; k<data.numberOfAllMatches; k++){

                var tmpResult = [];
                tmpResult.push(data.matches[k].result_first_club);
                tmpResult.push(data.matches[k].result_second_club);

                results[data.matches[k].round -1].push(tmpResult);
            }

            // Tournament tree - init
            var tournamentTree = {
                teams : teams,
                results : results
            };

            $('.tournament-tree').bracket({
                centerConnectors: true,
                teamWidth: 150,
                roundMargin: 30,
                init: tournamentTree
            });
        }
    });
}

function getListWithData(url, sortBy, direction) {

    $.ajax({
        type: 'GET',
        url: url,
        data: {sortBy: sortBy, direction: direction},
        cache: false,

        success: function(data){

            $('#content').html(data.list);

            var table = $('.table');

            addAnimation(table, 'fadeIn');

            window.setTimeout(function(){
                removeAnimation(table, 'fadeIn');
            }, 800);

            $('#loading').hide();
        }
    });
}

function getListWithTrophies(url) {

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,

        success: function(data){

            $('#content-trophies').html(data);

            var trophiesList = $('.trophies-list');
            var paginations = $('.pagination-links');

            addAnimation(trophiesList, 'fadeIn');
            addAnimation(paginations, 'fadeIn');

            window.setTimeout(function(){
                removeAnimation(trophiesList, 'fadeIn');
                removeAnimation(paginations, 'fadeIn');
            }, 800);
        }
    });
}

function getListWithMatches(url) {

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,

        success: function(data){

            $('#content-matches').html(data);

            var matchesList = $('.matches-list-list');
            var paginations = $('.pagination-links');

            addAnimation(matchesList, 'fadeIn');
            addAnimation(paginations, 'fadeIn');

            window.setTimeout(function(){
                removeAnimation(matchesList, 'fadeIn');
                removeAnimation(paginations, 'fadeIn');
            }, 800);
        }
    });
}

function getClubCardsWithPagination(url) {

    // Value from main search input
    var clubNameValue = $('#clubs-search-main').val();

    // Values from filter inputs
    var clubCountryValue = $('#clubs-filter-country').val();
    var clubCityValue = $('#clubs-filter-city').val();
    var clubMinTournamentPointsValue = $('#clubs-filter-min-rating').val();
    var clubMaxTournamentPointsValue = $('#clubs-filter-max-rating').val();

    $.ajax({
        type: 'GET',
        url: url,
        data: {
            clubNameValue: clubNameValue, clubCountryValue: clubCountryValue, clubCityValue: clubCityValue,
            clubMinTournamentPointsValue: clubMinTournamentPointsValue,
            clubMaxTournamentPointsValue: clubMaxTournamentPointsValue
        },
        cache: false,

        success: function(data){

            $('#content').html(data);

            var clubCards = $('.club-card');

            addAnimation(clubCards, 'fadeInRight');

            window.setTimeout(function(){
                removeAnimation(clubCards, 'fadeInRight');
            }, 3000);
        }
    });
}

function getFootballerCardsWithPagination(url) {

    // Value from main search input
    var footballerUsernameValue = $('#footballers-search-main').val();

    // Values from filter inputs
    var footballerCountryValue = $('#footballers-filter-country').val();
    var footballerCityValue = $('#footballers-filter-city').val();
    var footballerFootballPositionValue = $('#footballers-filter-football-position').val();

    $.ajax({
        type: 'GET',
        url: url,
        data: {
            footballerUsernameValue: footballerUsernameValue, footballerCountryValue: footballerCountryValue,
            footballerCityValue: footballerCityValue, footballerFootballPositionValue: footballerFootballPositionValue
        },
        cache: false,

        success: function(data){

            $('#content').html(data);

            var footballerCards = $('.footballer-card');

            addAnimation(footballerCards, 'fadeInRight');

            window.setTimeout(function(){
                removeAnimation(footballerCards, 'fadeInRight');
            }, 3000);
        }
    });
}

function getTournamentCardsWithPagination(url) {

    // Value from main search input
    var tournamentNameValue = $('#tournaments-search-main').val();

    // Values from filter inputs
    var tournamentStartDateValue = $('#tournaments-filter-start-date').val();
    var tournamentEndDateValue = $('#tournaments-filter-end-date').val();
    var tournamentCountryValue = $('#tournaments-filter-country').val();
    var tournamentCityValue = $('#tournaments-filter-city').val();
    var tournamentMinTournamentPointsValue = $('#tournaments-filter-min-rating').val();
    var tournamentMaxTournamentPointsValue = $('#tournaments-filter-max-rating').val();
    var tournamentNumberOfSeatsValue = $('#tournaments-filter-number-of-seats').val();
    var tournamentGameSystemValue = $('#tournaments-filter-game-system').val();
    var tournamentStatusValue = $('#tournaments-filter-status').val();

    $.ajax({
        type: 'GET',
        url: url,
        data: {
            tournamentNameValue: tournamentNameValue,
            tournamentStartDateValue: tournamentStartDateValue, tournamentEndDateValue: tournamentEndDateValue,
            tournamentCountryValue: tournamentCountryValue, tournamentCityValue: tournamentCityValue,
            tournamentMinTournamentPointsValue: tournamentMinTournamentPointsValue,
            tournamentMaxTournamentPointsValue: tournamentMaxTournamentPointsValue,
            tournamentNumberOfSeatsValue: tournamentNumberOfSeatsValue,
            tournamentGameSystemValue: tournamentGameSystemValue,
            tournamentStatusValue: tournamentStatusValue
        },
        cache: false,

        success: function(data){

            $('#content').html(data);

            var tournamentCards = $('.tournament-card');

            addAnimation(tournamentCards, 'fadeInRight');

            window.setTimeout(function(){
                removeAnimation(tournamentCards, 'fadeInRight');
            }, 3000);
        }
    });
}

function getClubCardsSearch(timer, url) {

    // Value from main search input
    var clubNameValue = $('#clubs-search-main').val();

    // Values from filter inputs
    var clubCountryValue = $('#clubs-filter-country').val();
    var clubCityValue = $('#clubs-filter-city').val();
    var clubMinTournamentPointsValue = $('#clubs-filter-min-rating').val();
    var clubMaxTournamentPointsValue = $('#clubs-filter-max-rating').val();

    clearTimeout(timer);
    timer = setTimeout(function() {

        $.ajax({
            type: 'GET',
            url: url,
            data: {
                clubNameValue: clubNameValue, clubCountryValue: clubCountryValue, clubCityValue: clubCityValue,
                clubMinTournamentPointsValue: clubMinTournamentPointsValue,
                clubMaxTournamentPointsValue: clubMaxTournamentPointsValue
            },
            cache: false,

            success: function(data){

                $('#content').html(data);

                var clubCards = $('.club-card');

                addAnimation(clubCards, 'fadeInRight');

                window.setTimeout(function(){
                    removeAnimation(clubCards, 'fadeInRight');
                }, 3000);

                $('#loading').hide();
            }
        });
    }, 400);

    return timer;
}

function getFootballerCardsSearch(timer, url) {

    // Value from main search input
    var footballerUsernameValue = $('#footballers-search-main').val();

    // Values from filter inputs
    var footballerCountryValue = $('#footballers-filter-country').val();
    var footballerCityValue = $('#footballers-filter-city').val();
    var footballerFootballPositionValue = $('#footballers-filter-football-position').val();

    clearTimeout(timer);
    timer = setTimeout(function() {

        $.ajax({
            type: 'GET',
            url: url,
            data: {
                footballerUsernameValue: footballerUsernameValue, footballerCountryValue: footballerCountryValue,
                footballerCityValue: footballerCityValue, footballerFootballPositionValue: footballerFootballPositionValue
            },
            cache: false,

            success: function(data){

                $('#content').html(data);

                var footballerCards = $('.footballer-card');

                addAnimation(footballerCards, 'fadeInRight');

                window.setTimeout(function(){
                    removeAnimation(footballerCards, 'fadeInRight');
                }, 3000);

                $('#loading').hide();
            }
        });
    }, 400);

    return timer;
}

function getTournamentCardsSearch(timer, url) {

    // Value from main search input
    var tournamentNameValue = $('#tournaments-search-main').val();

    // Values from filter inputs
    var tournamentStartDateValue = $('#tournaments-filter-start-date').val();
    var tournamentEndDateValue = $('#tournaments-filter-end-date').val();
    var tournamentCountryValue = $('#tournaments-filter-country').val();
    var tournamentCityValue = $('#tournaments-filter-city').val();
    var tournamentMinTournamentPointsValue = $('#tournaments-filter-min-rating').val();
    var tournamentMaxTournamentPointsValue = $('#tournaments-filter-max-rating').val();
    var tournamentNumberOfSeatsValue = $('#tournaments-filter-number-of-seats').val();
    var tournamentGameSystemValue = $('#tournaments-filter-game-system').val();
    var tournamentStatusValue = $('#tournaments-filter-status').val();

    clearTimeout(timer);
    timer = setTimeout(function() {

        $.ajax({
            type: 'GET',
            url: url,
            data: {
                tournamentNameValue: tournamentNameValue,
                tournamentStartDateValue: tournamentStartDateValue, tournamentEndDateValue: tournamentEndDateValue,
                tournamentCountryValue: tournamentCountryValue, tournamentCityValue: tournamentCityValue,
                tournamentMinTournamentPointsValue: tournamentMinTournamentPointsValue,
                tournamentMaxTournamentPointsValue: tournamentMaxTournamentPointsValue,
                tournamentNumberOfSeatsValue: tournamentNumberOfSeatsValue,
                tournamentGameSystemValue: tournamentGameSystemValue,
                tournamentStatusValue: tournamentStatusValue
            },
            cache: false,

            success: function(data){

                $('#content').html(data);

                var tournamentCards = $('.tournament-card');

                addAnimation(tournamentCards, 'fadeInRight');

                window.setTimeout(function(){
                    removeAnimation(tournamentCards, 'fadeInRight');
                }, 3000);

                $('#loading').hide();
            }
        });
    }, 400);

    return timer;
}

function isEmpty(el){
    return !$.trim(el.html())
}