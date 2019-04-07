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

use Illuminate\Http\Request;

Route::get('/', function () {
    return view('index');
});

Route::post('/logintradier', function(Request $request){

    $user = $request->user;
    $password = $request->password;

    if($user === 'test' && $password === 'test123'){
        return view('index');
    }else{
        header('Location:' . 'http://192.34.58.80/optionscanner/my-form/');
        exit();
    }

});

Route::get('{any}', 'LexaController@index');