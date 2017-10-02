$(function() {

    $(document).on('click', '.pagination-clubs a', function (e) {
        e.preventDefault();

        $('#loading').css('display', 'block');
        var url = $(this).attr('href');
        getClubs(url);
        window.history.pushState("", "", url);
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