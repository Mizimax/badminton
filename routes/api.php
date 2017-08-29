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
Route::get('/search', 'EventController@search');
Route::get('/event/{name}/hand', 'EventController@getEventHandStatus')->name('event_hand_check');
Route::get('/event/{name}/pay', 'EventController@getEventPayStatus')->name('event_pay_check');
Route::group(['middleware' => 'auth:api'], function () 
{
    Route::post('/event/{name}/regis', 'TeamController@store')->name('team_regis');
});

