
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

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};


$('img').on('error', function() {
    let ele = $(this),
        page = getUrlParameter('page');
    ele.attr('src', '/images/nophoto.jpg');

    axios.post('/image/empty', {
        id: ele.data('id'),
        page: page
    })
    .then(function (response) {
        // console.log(response.message);
    })
    .catch(function (error) {
        console.error(error);
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
