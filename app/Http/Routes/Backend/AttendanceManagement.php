<?php



Route::group([
    'prefix'     => 'attendance',
], function() {
    
	 Route::get('/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@index',
    ]);
	
	 
	 Route::get('addattendance/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@store',
    ]);
	
	 Route::get('deleteattendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@delete',
    ]);  
	  /* Route::get('EditProject/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@updateForm',
    ]);
	  Route::post('updateattendance', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@updateattendance',
    ]);
	 */
	
});

