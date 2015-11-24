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

Route::get('users/{id}/edit/register_document', ['as' => 'user.register.document', 'uses' => 'DocumentController@index']);
Route::post('users/{id}/edit/register_document', ['as' => 'user.register.document', 'uses' => 'DocumentController@process']);

Route::get('/verify_attendance/index',['as'=>'verify_attendance.professor', 'uses'=>'VerifyAttendanceController@index']);
Route::get('/verify_attendance/professor',['as'=>'verify_attendance.professor', 'uses'=>'VerifyAttendanceController@getProfessor']);

Route::get('/attendance/index',['as'=>'attendance.index','uses'=>'AttendanceController@index']);
Route::get('/attendance/{clase_id}/student',['as'=>'attendance.student.index','uses'=>'AttendanceController@getStudent']);

Route::post('/attendance/{clase_id}/student',['as'=>'attendance.student.process','uses'=>'AttendanceController@postStudent']);
Route::get('/attendance/professor',['as'=>'attendance.professor','uses'=>'AttendanceController@getProfessor']);

Route::get('index', ['as' => 'index', 'uses' => 'IndexController@index']);
