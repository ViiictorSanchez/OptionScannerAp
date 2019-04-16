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



Route::get('stockprofile', 'TradierWrapperController@stock')->name('stockprofile');


Route::name('data')->get('auth.php','TradierWrapperController@index');