<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::namespace('Frontend')->group(function () {
    Route::get('/', 'ShelterAnimalController@index')->name('index');

    Route::prefix('shelter-animals')->group(function () {
        Route::get('/', 'ShelterAnimalController@all')->name('all.shelter.animal');
        Route::get('{id}', 'ShelterAnimalController@show')->name('shelter.animal')->where('id', '[0-9]+');
        Route::get('shelter/{name}', 'ShelterAnimalController@showAnimalsByShelter')->name('shelter.by.animal');
    });

    Route::prefix('shelter')->group(function () {
        Route::get('/', 'ShelterController@index')->name('shelters');
        Route::get('{name}', 'ShelterController@show')->name('shelter');
    });
});

Route::namespace('Auth')->group(function () {
    Route::prefix('login')->group(function () {
        Route::get('{provider}', 'SocialAccountController@redirectToProvider')->name('login.redirect');
        Route::get('{provider}/callback', 'SocialAccountController@handleProviderCallback');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('lang/{locale}', ['as' => 'lang.switch', 'uses' => 'LanguageController@switchLang']);

Route::prefix('image')->group(function () {
    Route::post('empty', 'ImageController@update');
});
