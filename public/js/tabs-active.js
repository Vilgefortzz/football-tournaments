$(document).on('click', '#tab-trophies', function () {

    var tabTrophyForFirstPlace = $('#tab-trophy-first-place');

    $('#content-trophies').html('');
    tabTrophyForFirstPlace.addClass('active');

    var url = tabTrophyForFirstPlace.attr('href');
    getListWithTrophies(url);
});

$(document).on('click', '#tab-matches', function () {

    var tabFirstRoundMatch = $('#tab-match-first-round');

    $('#content-matches').html('');
    tabFirstRoundMatch.addClass('active');

    var url = tabFirstRoundMatch.attr('href');
    getListWithMatches(url);
});

$(document).on('click', '.tab-main-trophies', function () {
    $('#content-trophies').html('');
    $('.tab-trophies').removeClass('active');
});

$(document).on('click', '.tab-main-matches', function () {
    $('#content-matches').html('');
    $('.tab-matches').removeClass('active');
});


