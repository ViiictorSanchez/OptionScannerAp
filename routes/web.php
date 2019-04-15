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

Route::get('index', function () {
    return view('index');
});



Route::name('data')->get('auth.php','TradierWrapperController@index');

Route::get('{any}', 'LexaController@index');

Route::get('stockprofile', function () {
    return view('stockprofile');
})->name('stockprofile');