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

/* Ajax get event status */
Route::get('/event/{name}/hand', 'EventController@getEventHandStatus')->name('event_hand_check');
Route::get('/event/{name}/pay', 'EventController@getEventPayStatus')->name('event_pay_check');

/* login only */
Route::group(['middleware' => 'auth'], function () 
{
    /* Ajax */
    Route::post('/event/{name}/regis', 'TeamController@store')->name('team_regis');
});
