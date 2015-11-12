<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/users/register',['as'=>'user.register.index','uses'=>'UserRegisterController@index']);
Route::post('/users/register',['as'=>'user.register.process','uses'=>'UserRegisterController@process']);