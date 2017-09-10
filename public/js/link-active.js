$(document).ready(function() {

    // remove 'active' class from links
    $('.navbar-nav > .nav-item').removeClass('active');

    // get current URL path and assign 'active' class
    var url = window.location.href;
    $('.navbar-nav > .nav-item > a[href="'+url+'"]').parent().addClass('active');
});