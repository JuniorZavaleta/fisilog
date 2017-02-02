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

    Route::group(['prefix' => 'users'], function () {
        Route::get('/', ['as' => 'users.index', 'uses' => 'UserController@index']);
        Route::get('/new', ['as' => 'users.create', 'uses' => 'UserController@create']);
        Route::post('/new', ['as' => 'users.store', 'uses' => 'UserController@store']);

        Route::get('{user_id}/documents', ['as' => 'users.documents', 'uses' => 'DocumentController@index']);
    });

    Route::group(['prefix' => 'facultades'], function () {
        Route::get('/', ['as' => 'facultades.index', 'uses' => 'FacultadController@index']);
        Route::get('/new', ['as' => 'facultades.create', 'uses' => 'FacultadController@create']);
        Route::post('/new', ['as' => 'facultades.store', 'uses' => 'FacultadController@store']);

        Route::get('/{id}/edit', ['as' => 'facultades.edit', 'uses' => 'FacultadController@edit']);
        Route::post('/{id}/edit', ['as' => 'facultades.update', 'uses' => 'FacultadController@update']);

        Route::group(['prefix' => '{facultad_id}/academic_periods'], function () {
            Route::get('/', ['as' => 'facultades.academic_periods', 'uses' => 'AcademicPeriodController@index']);
            Route::get('/new', ['as' => 'facultades.academic_periods.create', 'uses' => 'AcademicPeriodController@create']);
            Route::post('/new', ['as' => 'facultades.academic_periods.store', 'uses' => 'AcademicPeriodController@store']);
        });

        Route::group(['prefix' => '{id}/classrooms'], function () {
            Route::get('/', ['as' => 'facultades.classrooms', 'uses' => 'ClassRoomController@index']);
        });

        Route::get('/{facultad_id}/eaps', ['as' => 'eaps', 'uses' => 'EapController@getByFacultad']);
    });

    Route::group(['prefix' => 'eaps', 'as' => 'eaps.'], function () {
        Route::get('/', ['as' => 'index', 'uses' => 'EapController@index']);
        Route::get('/new', ['as' => 'create', 'uses' => 'EapController@create']);
        Route::post('/new', ['as' => 'store', 'uses' => 'EapController@store']);

        Route::get('/{id}/edit', ['as' => 'edit', 'uses' => 'EapController@edit']);
        Route::post('/{id}/edit', ['as' => 'update', 'uses' => 'EapController@update']);

        Route::group(['prefix' => '{eap_id}/academic_plans', 'as' => 'academic_plans.'], function () {
            Route::get('/', ['as' => 'index', 'uses' => 'AcademicPlanController@index']);
            Route::get('/new', ['as' => 'create', 'uses' => 'AcademicPlanController@create']);
            Route::post('/new', ['as' => 'store', 'uses' => 'AcademicPlanController@store']);

            Route::group(['prefix' => '{academic_plan}'], function () {
                Route::group(['prefix' => 'courses', 'as' => 'courses.'], function () {
                    Route::get('/', ['as' => 'index', 'uses' => 'CourseController@index']);
                });
            });
        });

        Route::get('/{eap_id}/courses/{ciclo}', ['as' => 'courses', 'uses' => 'CourseController@getByEap']);
    });

    Route::group(['prefix' => 'classes', 'as' => 'classes.'], function () {
        Route::get('/search', ['as' => 'index', 'uses' => 'ClassController@index']);
        Route::get('/getByCourse/{course}', ['as' => 'getByCourse', 'uses' => 'ClassController@search']);
        Route::get('/show/{clase}', ['as' => 'show', 'uses' => 'ClassController@show']);

        Route::group(['prefix' => '{clase}'], function () {
            Route::group(['prefix' => 'attendances', 'as' => 'attendances.'], function () {
                Route::get('/', ['as' => 'index', 'uses' => 'AttendanceController@index']);
                Route::get('/new', ['as' => 'store', 'uses' => 'AttendanceController@storeProfessor']);
            });

            Route::group(['prefix' => 'sessions_class', 'as' => 'sessions_class.'], function () {
                Route::get('/{session_class}', ['as' => 'index', 'uses' => 'SessionClassController@show']);
                Route::post('/{session_class}/store_student_attendance', ['as' => 'store_student', 'uses' => 'AttendanceController@storeStudent']);
                Route::post('/{session_class}/cancel', ['as' => 'cancel', 'uses' => 'SessionClassController@cancel']);
            });
        });
    });

    Route::group(['prefix' => 'students', 'as' => 'students.'], function () {
        Route::post('/getByDocument', ['as' => 'getByDocument', 'uses' => 'StudentController@getByDocument']);
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

