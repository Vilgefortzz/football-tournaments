$(function() {

    var timer;

    $(document).on('keyup', '#search-main', function () {

        $('#content').html('');

        $('#loading').css('display', 'block');
        var url = $(this).attr('href');
        var value = $(this).val();

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
        }, 300);
    });
});