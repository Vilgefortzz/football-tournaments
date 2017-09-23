$(function() {

    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();

        $('#loading').css('display', 'block');
        var url = $(this).attr('href');
        getContracts(url);
        window.history.pushState("", "", url);
    });
});

function getContracts(url) {

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,

        success: function(data){

            $('#content').html(data);

            var menuCards = $('.menu-card');
            var jumbotrons = $('.jumbotron');

            addAnimation(menuCards, 'pulse');
            addAnimation(jumbotrons, 'pulse');

            window.setTimeout(function(){
                removeAnimation(menuCards, 'pulse');
                removeAnimation(jumbotrons, 'pulse');
            }, 800);

            $('#loading').hide();
        }
    });
}