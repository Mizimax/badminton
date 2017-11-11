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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page2', 'Support_wezync@page2');
Route::get('/page3', 'Support_wezync@page3');
Route::get('/page4', 'Support_wezync@page4');
Route::get('/page5', 'Support_wezync@page5');
Route::get('/page6', 'Support_wezync@page6');
Route::get('/page7', 'Support_wezync@page7');
Route::get('/page8', 'Support_wezync@page8');
Route::get('/page9', 'Support_wezync@page9');

Route::get('/coin', 'Support_wezync@coin');

