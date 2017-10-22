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

Route::get('/', 'HomeController@index');
Route::get('/coin_shop', 'CoinShopController@index');
Auth::routes();
Route::get('/redirect', 'SocialAuthFacebookController@redirect');
Route::get('/callback', 'SocialAuthFacebookController@callback');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/event_detail/{event_id}', 'EventController@detail')->name('event_detail');
Route::post('/register_event', 'EventController@register');
Route::post('/check_team_name', 'EventController@checkTeamName');