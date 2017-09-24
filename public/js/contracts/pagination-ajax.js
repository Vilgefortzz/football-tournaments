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

            var contractCards = $('.contract-card');

            addAnimation(contractCards, 'pulse');

            window.setTimeout(function(){
                removeAnimation(contractCards, 'pulse');
            }, 800);

            $('#loading').hide();
        }
    });
}