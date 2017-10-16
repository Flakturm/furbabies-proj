<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1'], function()
{
    // shuffle random page
    Route::get('shelter_animals/random','Api\v1\ShelterAnimalController@getRandomPage');
    // get single page
    Route::get('shelter_animals/{page}/{filter?}','Api\v1\ShelterAnimalController@getPage')
    ->where(['page' => '[0-9]+', 'filter' => '(.*)']);
    // get list of animals
    Route::get('shelter_animals/{filter?}','Api\v1\ShelterAnimalController@index')->where('filter', '(.*)');
});
