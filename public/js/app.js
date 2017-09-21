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