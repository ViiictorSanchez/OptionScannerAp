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
    return view('index');
});

Route::get('index','TradierWrapperController@dashboard');


Route::get('index_data','TradierWrapperController@index_data');

Route::get("pagination", 'TradierWrapperController@pagination')->name('pagination');

Route::get('stockprofile', 'TradierWrapperController@stock')->name('stockprofile');

Route::get('gains', 'TradierWrapperController@pagination')->name('gains');

Route::get('gains_data', 'TradierWrapperController@gains');

Route::name('data')->get('auth.php','TradierWrapperController@index');

Route::get('account','TradierWrapperController@account')->name('account');