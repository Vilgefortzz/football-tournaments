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
            }, 3000);
        }
    });
}

function isEmpty(el){
    return !$.trim(el.html())
}