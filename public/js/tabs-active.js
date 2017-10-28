$(document).on('click', '.tab-remove-active', function () {
    $('.tab-pane-trophies').removeClass('active');
});

$(document).on('click', '.tab-add-active', function () {
    $('.tab-trophies').removeClass('active');
    $('#tab-trophy-first-place').addClass('active');
    $('#tab-trophies-first-place').addClass('active');
});

