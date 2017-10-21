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

function isEmpty(el){
    return !$.trim(el.html())
}