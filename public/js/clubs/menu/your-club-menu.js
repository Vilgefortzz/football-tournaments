$(function() {

    $(document).on('click', '#your-club-menu-next', function (e) {
        e.preventDefault();

        $(this).hide();
        var url = $(this).attr('href');
        ajaxRequestSubMenu(url);
        $('#your-club-menu-previous').fadeIn();
    });

    $(document).on('click', '#your-club-menu-previous', function (e) {
        e.preventDefault();

        $(this).hide();
        var url = $(this).attr('href');
        ajaxRequestSubMenu(url);
        $('#your-club-menu-next').fadeIn();
    });
});

function ajaxRequestSubMenu(url) {

    $.ajax({
        type: "GET",
        url: url,
        cache: false,

        success: function (data) {

            $('#content-sub-menu').html(data);

            var subMenuCards = $('.sub-menu-card');

            addAnimation(subMenuCards, 'slideInRight');

            window.setTimeout(function(){
                removeAnimation(subMenuCards, 'slideInRight');
            }, 1000);
        }
    });
}