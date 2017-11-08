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
Route::get('/event_modal/{event_id}', 'EventController@modal')->name('event_modal');
Route::post('/register_event', 'EventController@register');
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');


Route::get('/split_line/{event_id}', 'SplitLineController@split')->name('split_line');
Route::get('/run_match/{event_id}', 'SplitLineController@run_match')->name('run_match');
Route::get('/run_set_match/{event_id}', 'SplitLineController@run_set_match')->name('run_set_match');
Route::get('/run_match_knockout/{event_id}', 'SplitLineController@run_match_knockout')->name('run_match_knockout');
Route::get('/run_set_knockout/{event_id}', 'SplitLineController@run_set_knockout')->name('run_match_knockout');
Route::get('/get_math/{event_id}/{race_id}', 'EventController@get_math')->name('get_math');
Route::get('/get_knockout/{event_id}/{race_id}', 'EventController@get_knockout')->name('get_knockout');

