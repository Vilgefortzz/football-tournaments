$(function () {

    $('.start-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time : false});
    $('.end-date').bootstrapMaterialDatePicker({weekStart : 1, format : 'DD/MM/YYYY', time : false});

    $('.start-date')
        .on('change', function(e, date) {

            $('#tournament-end-date-section').fadeIn('slow');
            $('.end-date').bootstrapMaterialDatePicker('setMinDate', date);
        });
});