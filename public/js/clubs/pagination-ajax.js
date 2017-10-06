$(function() {

    $(document).on('click', '.pagination-clubs-list a', function (e) {
        e.preventDefault();

        var url = $(this).attr('href');
        getClubs(url);
        window.history.pushState("", "", url);
    });

    $(document).on('click', '.pagination-clubs-searchable-cards a', function (e) {
        e.preventDefault();

        $('#content').html('');
        $('#loading').css('display', 'block');

        var url = $(this).attr('href');
        var value = $('#search-main').val();

        getClubCards(url, value);
    });
});

function getClubs(url) {

    $.ajax({
        type: 'GET',
        url: url,
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

function getClubCards(url, value) {

    $.ajax({
        type: 'GET',
        url: url,
        data: {value: value},
        cache: false,

        success: function(data){

            $('#content').html(data);

            var clubCards = $('.club-card');

            addAnimation(clubCards, 'fadeInRight');

            window.setTimeout(function(){
                removeAnimation(clubCards, 'fadeInRight');
            }, 1500);

            $('#loading').hide();
        }
    });
}