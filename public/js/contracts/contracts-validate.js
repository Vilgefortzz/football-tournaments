$(function() {

    // Set interval to check if binding contract is expired ( every 1 second )
    setInterval(function () {

        var url = $('.contracts-validate').attr('href');
        checkContractsValidity(url);

    }, 1500);
});

function checkContractsValidity(url) {

    $.ajax({
        type: 'POST',
        url: url,
        cache: false,

        success: function(data){

            if (data){
                flashy(data);
            }
        }
    });
}