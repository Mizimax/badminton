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

/* auth routes */
Route::post('login', 'Auth\LoginController@login');
Route::post('register', 'Auth\RegisterController@register');
Route::post('logout', 'Auth\LoginController@logout');

/* social routes */
Route::get('fb/redirect', 'SocialAuthController@redirect');
Route::get('fb/callback', 'SocialAuthController@callback');

/* anyone can access */
Route::get('/', 'EventController@index')->name('event');
Route::get('/event/{name}', 'EventController@show')->name('event_show');

/* login only */
Route::group(['middleware' => 'auth'], function () 
{
    Route::post('/event/{name}/regis', 'TeamController@store')->name('team_regis');
});


