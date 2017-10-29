$(document).on('click', '#tab-trophies', function () {

    var tabTrophyForFirstPlace = $('#tab-trophy-first-place');

    $('#content-trophies').html('');

    $('.tab-trophies').removeClass('active');
    tabTrophyForFirstPlace.addClass('active');

    var url = tabTrophyForFirstPlace.attr('href');
    getListWithTrophies(url);
});

$(document).on('click', '.tab-main', function () {
    $('#content-trophies').html('');
});


