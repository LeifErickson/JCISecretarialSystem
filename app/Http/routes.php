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




// Route::get('/admin/members',function(){
//     return Redirect::action('MemberController@index' , array('id'=>Auth::id()) )->withErrors($validator->errors());
//     // return view('backend.members');
// });

// 
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
    Route::get('members', 'MemberController@home')->name('admin.members');
    Route::get('projects', 'ProjectController@index')->name('admin.projects');
    Route::get('events', 'EventController@index')->name('admin.events');
    require (__DIR__ . '/Routes/Backend/Dashboard.php');
    require (__DIR__ . '/Routes/Backend/Access.php');
    require (__DIR__ . '/Routes/Backend/LogViewer.php');
});

Route::group(['namespace' => 'Backend', 'prefix' => 'manage', 'middleware' => 'admin'], function () {
Route::resource('members','MemberController');
});