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

Route::middleware('OrgAndAdmin')->group(function () {
  Route::get('/org/register/step/success', 'OrgController@success');
  Route::get('/event/create', 'OrgController@create');
  Route::post('/event/create', 'OrgController@save');
  Route::post('/event/create/upload', 'OrgController@uploadSlide');
});

Route::get('/event/{event_id}', 'EventController@detail')->name('event_detail');
Route::get('/event_modal/{event_id}', 'EventController@modal')->name('event_modal');
Route::post('/register_event', 'EventController@register');
Route::post('/register', 'UserController@register');
Route::post('/login', 'UserController@login');

Route::get('/get_match/{event_id}/{race_id}', 'EventController@get_math')->name('get_math');
Route::get('/get_knockout/{event_id}/{race_id}', 'EventController@get_knockout')->name('get_knockout');
Route::get('/register_special_event/{event_id}', 'EventController@register_special_event')->name('register_special_event');
Route::get('/prize/{event_id}', 'EventController@prize')->name('prize');
Route::get('/get_member_special_rewards/{event_id}', 'EventController@get_member_special_rewards')->name('get_member_special_rewards');


Route::get('/org/register/step/verify/{token}', 'OrgController@verifyEmail');
Route::middleware('org_reg')->group(function () {
  Route::get('/org/register', 'OrgController@info');
  Route::post('/org/register', 'OrgController@infoRegis');
  Route::get('/org/register/step/verify', 'OrgController@verify');
  Route::post('/org/register/step/verify', 'OrgController@verifyRegis');
  Route::post('/org/register/step/verify/upload', 'OrgController@upload');
  Route::get('/org/register/step/email', 'OrgController@email');
});

Route::middleware('admin')->group(function () {
  Route::get('/org/checks', 'OrgController@getCheck');
  Route::get('/org/check/{user_id}', 'OrgController@check');
  Route::post('/org/check/{user_id}', 'OrgController@checkActive');
  Route::get('/add_score', 'MatchController@add_score')->name('add_score');
  Route::get('/search_match/{match_id}', 'MatchController@search_match')->name('search_match');
  Route::post('/edit_score', 'MatchController@edit_score')->name('edit_score');
});

Route::group([ 'middleware' => ['OrgAndAdmin', 'my_org'] ], function () {
  Route::get('/event/{event_id}/edit', 'OrgController@edit')->name('event_edit');
  Route::patch('/event/{event_id}/edit', 'OrgController@save')->name('event_edit');
  Route::delete('/event/{event_id}/member/{member_id}', 'OrgController@removeMember')->name('member_remove');
  Route::patch('/event/{event_id}/member/{member_id}/hand', 'OrgController@updateHand')->name('hand_update');
  Route::patch('/event/{event_id}/member/{member_id}/status', 'OrgController@updateStatus')->name('member_status_update');
  Route::patch('/event/{event_id}/member/{member_id}/payment', 'OrgController@updatePayment')->name('member_payment_update');
  Route::patch('/event/{event_id}/race', 'OrgController@updateHandStatus')->name('race_close');
  Route::patch('/event/{event_id}/race/{race_id}/count', 'OrgController@updateHandCount')->name('update_hand_count');
  Route::patch('/event/{event_id}/race/remove', 'OrgController@raceRemove')->name('race_remove');
  Route::patch('/event/{event_id}/match/{match_id}/time', 'MatchController@changeTime')->name('change_time');
  Route::get('/add_score/{event_id}', 'MatchController@add_score_id')->name('add_score');
  Route::get('/search_match/{event_id}/{match_id}', 'MatchController@search_match_id')->name('search_match');
  Route::get('/split_line/{event_id}', 'SplitLineController@split')->name('split_line');
  Route::post('/confirm/{event_id}', 'SplitLineController@verify')->name('confirm_line');
  Route::get('/run_match/{event_id}', 'SplitLineController@run_match')->name('run_match');
  Route::get('/run_set_match/{event_id}', 'SplitLineController@run_set_match')->name('run_set_match');
  Route::get('/run_match_knockout/{event_id}', 'SplitLineController@run_match_knockout')->name('run_match_knockout');
  Route::get('/run_set_knockout/{event_id}', 'SplitLineController@run_set_knockout')->name('run_match_knockout');
  Route::post('/edit_score/{event_id}', 'MatchController@edit_score_id')->name('edit_score');
});

Route::get('/show_court/{event_id}', 'TVController@show_court')->name('show_court');
Route::get('/tv/{event_id}', 'TVController@tv')->name('tv');
Route::get('/show_table_match/{event_id}', 'MatchController@show_table_match')->name('show_table_match');
Route::get('/show_line/{event_id}/{race_id}/{line_name}', 'MatchController@show_line')->name('show_line');
Route::get('/news_special_event/{event_id}', 'TVController@news_special_event')->name('news_special_event');