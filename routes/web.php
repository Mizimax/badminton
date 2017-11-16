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
Route::get('/register_special_event/{event_id}', 'EventController@register_special_event')->name('register_special_event');
Route::get('/prize/{event_id}', 'EventController@prize')->name('prize');
Route::get('/get_member_special_rewards/{event_id}', 'EventController@get_member_special_rewards')->name('get_member_special_rewards');
Route::get('/add_score/{event_id}', 'MatchController@add_score')->name('add_score');
Route::get('/search_match/{match_id}', 'MatchController@search_match')->name('search_match');
Route::post('/edit_score', 'MatchController@edit_score')->name('edit_score');

Route::get('/show_court/{event_id}', 'TVController@show_court')->name('show_court');
Route::get('/tv/{event_id}', 'TVController@tv')->name('tv');
Route::get('/show_table_match/{event_id}', 'MatchController@show_table_match')->name('show_table_match');
Route::get('/show_line/{event_id}/{race_id}/{line_name}', 'MatchController@show_line')->name('show_line');