<?php

Route::group(['middleware' => 'web'], function() {
    /**
     * Switch between the included languages
     */
    Route::group(['namespace' => 'Language'], function () {
        require (__DIR__ . '/Routes/Language/Language.php');
    });

    /**
     * Frontend Routes
     * Namespaces indicate folder structure
     */
    Route::group(['namespace' => 'Frontend'], function () {
        require (__DIR__ . '/Routes/Frontend/Frontend.php');
        require (__DIR__ . '/Routes/Frontend/Access.php');
    });

    
});

/**
 * Backend Routes
 * Namespaces indicate folder structure
 * Admin middleware groups web, auth, and routeNeedsPermission
 */
Route::group(['namespace' => 'Backend', 'prefix' => 'admin', 'middleware' => 'admin'], function () {
    /**
     * These routes need view-backend permission
     * (good if you want to allow more than one group in the backend,
     * then limit the backend features by different roles or permissions)
     *
     * Note: Administrator has all permissions so you do not have to specify the administrator role everywhere.
     */
    require (__DIR__ . '/Routes/Backend/Dashboard.php');
    require (__DIR__ . '/Routes/Backend/Access.php');
    require (__DIR__ . '/Routes/Backend/LogViewer.php');
	require (__DIR__ . '/Routes/Backend/EventManagement.php');
	require (__DIR__ . '/Routes/Backend/AttendanceManagement.php');
	require (__DIR__ . '/Routes/Backend/AttendanceMonitoring.php');
});

Route::group(['middleware' => ['admin'], 'prefix' => 'admin'], function () {
	Route::resource('members', 'Admin\\MembersController');
    Route::resource('category', 'Admin\\CategoryController');
    Route::resource('events/projects', 'Admin\\ProjectController');
    Route::resource('events/meetings', 'Admin\\MeetingsController');
    Route::resource('events/meetings', 'Admin\\MeetingsController');
    Route::resource('events/all', 'Admin\\AllEventsController');
    Route::resource('payments', 'Admin\\PaymentController');
});

/*
|--------------------------------------------------------------------------
| API routes
|--------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'API'], function () {
    Route::group(['prefix' => 'v1'], function () {
        require config('infyom.laravel_generator.path.api_routes');
    });
});


/*
|--------------------------------------------------------------------------
| Generator routes
|--------------------------------------------------------------------------
*/
Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder');
Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
