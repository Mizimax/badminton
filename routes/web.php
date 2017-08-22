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

Auth::routes();

/* anyone can access */
Route::get('/', 'EventController@index')->name('event');
Route::get('/event/{id}', 'EventController@show')->where('id','[0-9]+')->name('event_show');

/* login only */
Route::group(['middleware' => 'auth'], function () 
{
    Route::post('/event/{id}/regis', 'TeamController@store')->where('id','[0-9]+')->name('team_regis');
});
