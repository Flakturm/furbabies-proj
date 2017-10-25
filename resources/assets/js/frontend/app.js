
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
NProgress.done();
// Trigger bar when exiting the page
$(window).on('beforeunload', function(){
    NProgress.start();
 });

$(function () {

});
