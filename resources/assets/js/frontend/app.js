
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('../bootstrap');
window.NProgress = require('nprogress');
require('select2');

// Show the progress bar
NProgress.start();
// Trigger finish when page fully loaded
$(window).on('load', function () {
    NProgress.done();
});
// Trigger bar when exiting the page
$(window).on('beforeunload', function (){
    NProgress.start();
});

function getUrlParameter(name) {
    name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
    var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
    var results = regex.exec(location.search);
    return results === null ? '' : decodeURIComponent(results[1].replace(/\+/g, ' '));
};

$('img').on('error', function () {
    $(this).attr('src', '/images/nophoto.jpg');
    axios.post('/image/empty', {
        id: $(this).data('id'),
        page: getUrlParameter('page')
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
    // select2
    $('.select2').select2({
        // cache: true
    });

    $('#area').select2({
        ajax: {
            url: '/api/areas',
            dataType: "json",
            type: "GET",
            processResults: function (data) {
                data = $.extend({
                  0: $('#area').data('placeholder')
                }, data);
                return {
                    results: $.map(data, function (text, id) {
                                return {
                                    id: id,
                                    text: text
                                }
                    })
                };
            },
            cache: true
        }
    });

    let area_id = $('#area').val();

    if (area_id) {
        $('#shelter').select2({
            ajax: {
                url: '/api/area/shelters/' + area_id,
                dataType: "json",
                type: "GET",
                processResults: function (data) {
                    data = $.extend({
                        0: $('#shelter').data('placeholder')
                    }, data);
                    return {
                        results: $.map(data, function (text, id) {
                            return {
                                id: id,
                                text: text
                            }
                        })
                    };
                },
                cache: true
            }
        });
    }

    $('#area').on('select2:select', function (e) {
        var data = e.params.data,
            init_data = [{
            id: 0,
            text: $('#shelter').data('placeholder')
        }];

        if ( data.id > 0 ) {
            axios.get('/api/area/shelters/' + data.id)
            .then(function (response) {
                $('#shelter').val(null).trigger('change');
                $('#shelter').empty();
                let new_data = $.map(response.data, function (text, id) {
                    return {text: text, id: id};
                });

                $('#shelter').select2({
                    data: $.merge(init_data, new_data)
                });
            })
            .catch(function (error) {
                console.log(error);
            });
        }
        else {
            $('#shelter').empty();

            let new_option = new Option(init_data.text, init_data.id, false, false);
            $('#shelter').append(new_option).trigger('change');
        }
    });
});
