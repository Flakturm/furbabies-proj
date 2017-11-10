
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');
window.NProgress = require('nprogress');
window.Select2 = require('select2');

// Show the progress bar
NProgress.start();
// Trigger finish when page fully loaded
$(window).on('load', function() {
    NProgress.done();
});
// Trigger bar when exiting the page
$(window).on('beforeunload', function(){
    NProgress.start();
});

$('img').on('error', function() {
    let ele = $(this);
    ele.attr('src', '/images/nophoto.jpg');
    // console.log(ele.data('id'));
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({
        type:"POST",
        url:'/image/empty',
        data: { 'id': ele.data('id') },
        dataType: 'json',
        // success: function(data){
        //     console.log(data.message);
        // },
        // error: function(data){
        //
        // }
    });
});

$(function () {
    $(window).scroll(function () {
        if ($(this).scrollTop() > 50) {
            $('#back-to-top').fadeIn();
        } else {
            $('#back-to-top').fadeOut();
        }
    });
    // scroll body to 0px on click
    $('#back-to-top').click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 800);
        return false;
    });
});
