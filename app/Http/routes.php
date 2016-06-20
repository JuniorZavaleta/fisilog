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
Route::group(['middleware' => ['web', 'auth'], 'namespace' => 'Backend'], function () {

   Route::get('index', ['as' => 'index', 'uses' => 'IndexController@index']);

   Route::group(['prefix' => 'users', 'as' => 'users.'], function() {
      Route::get('/', ['as' => 'index', 'uses' => 'UserController@index']);
      Route::get('/new', ['as' => 'create', 'uses' => 'UserController@create']);
      Route::post('/new', ['as' => 'store', 'uses' => 'UserController@store']);

      Route::group(['prefix' => '{user}'], function(){
         Route::group(['prefix' => 'documents', 'as' => 'documents.'], function(){
            Route::get('/', ['as' => 'index', 'uses' => 'DocumentController@index']);
         });
      });
   });

   Route::group(['prefix' => 'facultades', 'as' => 'facultades.'], function() {
      Route::get('/', ['as' => 'index', 'uses' => 'FacultadController@index']);
      Route::get('/new', ['as' => 'create', 'uses' => 'FacultadController@create']);
      Route::post('/new', ['as' => 'store', 'uses' => 'FacultadController@store']);

      Route::group(['prefix' => '{facultad}'], function(){
         Route::group(['prefix' => 'classrooms', 'as' => 'classrooms.'], function(){
            Route::get('/', ['as' => 'index', 'uses' => 'ClassRoomController@index']);
         });

         Route::get('/edit', ['as' => 'edit', 'uses' => 'FacultadController@edit']);
         Route::post('/edit', ['as' => 'update', 'uses' => 'FacultadController@update']);

         Route::get('/eaps', ['as' => 'eaps', 'uses' => 'EapController@getByFacultad']);
      });
   });

   Route::group(['prefix' => 'eaps', 'as' => 'eaps.'], function() {
      Route::get('/', ['as' => 'index', 'uses' => 'EapController@index']);
      Route::get('/new', ['as' => 'create', 'uses' => 'EapController@create']);
      Route::post('/new', ['as' => 'store', 'uses' => 'EapController@store']);

      Route::group(['prefix' => '{eap}'], function(){
         Route::get('/edit', ['as' => 'edit', 'uses' => 'EapController@edit']);
         Route::post('/edit', ['as' => 'update', 'uses' => 'EapController@update']);

         Route::group(['prefix' => 'academic_plans', 'as' => 'academic_plans.'], function() {
            Route::get('/', ['as' => 'index', 'uses' => 'AcademicPlanController@index']);
            Route::get('/new', ['as' => 'create', 'uses' => 'AcademicPlanController@create']);
            Route::post('/new', ['as' => 'store', 'uses' => 'AcademicPlanController@store']);

            Route::group(['prefix' => '{academic_plan}'], function(){
               Route::group(['prefix' => 'courses', 'as' => 'courses.'], function() {
                  Route::get('/', ['as' => 'index', 'uses' => 'CourseController@index']);
               });
            });
         });

         Route::get('/courses/{ciclo}', ['as' => 'courses', 'uses' => 'CourseController@getByEap']);
      });
   });

   Route::group(['prefix' => 'classes', 'as' => 'classes.'], function() {
      Route::get('/search', ['as' => 'index', 'uses' => 'ClassController@index']);
      Route::get('/getByCourse/{course}', ['as' => 'index', 'uses' => 'ClassController@search']);
   });


});

Route::group(['middleware' => ['web']], function () {

   Route::get('/', function () {
       return redirect()->route('auth.login');
   });

   Route::get('login', ['as' => 'auth.login' , 'uses' => 'Auth\AuthController@getLogin']);
   Route::post('login', ['as' => 'authenticate.email' , 'uses' => 'Auth\AuthController@postLogin']);
   Route::post('/authenticateDocument', ['as' => 'authenticate.document' , 'uses' => 'Auth\AuthController@authenticationDocument']);

   Route::get('logout', ['as' => 'auth.logout' , 'uses' => 'Auth\AuthController@logout']);

});

