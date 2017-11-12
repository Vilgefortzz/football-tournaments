 $(function(){

    $(document).on('click', '.prev-step', function () {

        $('.btn-circle-step').prop('disabled', true);
        $('.tab-pane').removeClass('active');

        var previousStepId = $(this).data('previous-step-id');
        var currentStepId = $(this).data('current-step-id');

        $('#step-' + currentStepId).removeClass('my-color-3');

        if (typeof previousStepId !== typeof undefined && previousStepId !== false) {
            $('#step-' + previousStepId).prop("disabled", false);
        }

        $('#step-' + previousStepId).addClass('active my-color-3');
        $('#menu-' + previousStepId).addClass('active');
    });

    $(document).on('click', '.next-step', function () {

        $('.btn-circle-step').prop('disabled', true);
        $('.tab-pane').removeClass('active');

        var nextStepId = $(this).data('next-step-id');

        if (typeof nextStepId !== typeof undefined && nextStepId !== false) {
            $('#step-' + nextStepId).prop("disabled", false);
        }

        $('#step-' + nextStepId).addClass('active my-color-3');
        $('#menu-' + nextStepId).addClass('active');
    });
});