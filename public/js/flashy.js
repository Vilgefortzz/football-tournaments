function flashy(message) {
    var template = $($("#flashy-template").html());
    $(".flashy").remove();
    template.find(".flashy__body").html(message).end()
        .appendTo("body").hide().fadeIn(800).delay(6000).animate({
        marginRight: "-100%"
    }, 1000, "swing", function() {
        $(this).remove();
    });
}