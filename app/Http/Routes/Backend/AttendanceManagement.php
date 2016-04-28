<?php



Route::group([
    'prefix'     => 'attendance',
], function() {
    
	 Route::get('/', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@index',
    ]);
	 Route::get('add', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@addattendanceForm',
    ]);
	 Route::post('addattendance', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@store',
    ]);
	 Route::get('deleteattendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@delete',
    ]);  
	  Route::get('EditProject/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@updateForm',
    ]);
	  Route::post('updateattendance', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@updateattendance',
    ]);
	 
	
});

