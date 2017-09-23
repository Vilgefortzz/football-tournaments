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