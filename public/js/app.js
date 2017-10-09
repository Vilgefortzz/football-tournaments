$(function () {

    /*
Submit form - upload profile image
 */
    $(document).on('change', '#avatar', function () {
        $('#profile-form').submit();
    });

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

function getClubs(url, sortBy, direction) {

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
        }
    });
}

function getClubCardsWithPagination(url) {

    // Value from main search input
    var clubNameValue = $('#search-main').val();

    // Values from filter inputs
    var clubCountryValue = $('#filter-country').val();
    var clubCityValue = $('#filter-city').val();
    var clubMinTournamentPointsValue = $('#filter-min-rating').val();
    var clubMaxTournamentPointsValue = $('#filter-max-rating').val();

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

function getClubCardsSearch(timer, url) {

    // Value from main search input
    var clubNameValue = $('#search-main').val();

    // Values from filter inputs
    var clubCountryValue = $('#filter-country').val();
    var clubCityValue = $('#filter-city').val();
    var clubMinTournamentPointsValue = $('#filter-min-rating').val();
    var clubMaxTournamentPointsValue = $('#filter-max-rating').val();

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

function isEmpty(el){
    return !$.trim(el.html())
}