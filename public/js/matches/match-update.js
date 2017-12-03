$(function() {

    $(document).on('change', '.match-detail', function () {

        var url = $(this).attr('href');
        var name = $(this).attr('name');
        var value = $(this).val();

        ajaxUpdateMatchRequest(url, name, value);
    });
});

function ajaxUpdateMatchRequest(url, name, value) {

    $.ajax({
        type: 'PUT',
        url: url,
        data: {name: name, value: value},
        cache: false,

        success: function (message) {
            flashy(message);
        }
    });
}