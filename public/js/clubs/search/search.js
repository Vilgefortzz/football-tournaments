$(function() {

    var timer;
    $(document).on('keyup', '#search-main', function () {

        $('#content').html('');
        $('#loading').css('display', 'block');

        // Value from search
        var value = $(this).val();

        if(value === ''){

            var clubListUrl = $('#clubs-list').attr('href');
            ajaxRequestDynamicContentClubsList(clubListUrl);
            window.history.pushState("", "", clubListUrl);
        }
        else{

            var url = $(this).attr('href');

            clearTimeout(timer);
            timer = setTimeout(function() {

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
            }, 400);
        }
    });
});

function ajaxRequestDynamicContentClubsList(url) {

    $.ajax({
        type: 'GET',
        url: url,
        cache: false,

        success: function(data){

            $('#content').html(data.list);

            var jumbotrons = $('.jumbotron');
            var paginations = $('.pagination-links');

            addAnimation(jumbotrons, 'zoomInUp');
            addAnimation(paginations, 'zoomInUp');

            window.setTimeout(function(){
                removeAnimation(jumbotrons, 'zoomInUp');
                removeAnimation(paginations, 'zoomInUp');
            }, 1000);

            $('#loading').hide();
        }
    });
}