<?php



Route::group([
    'prefix'     => 'attendanceEve',
], function() {
    
	 Route::get('/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsAttendanceController@index',
    ]);
	
	 
	 Route::get('addattendance/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsAttendanceController@store',
    ]);
	
	 Route::get('deleteattendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsAttendanceController@delete',
    ]);  
	  Route::get('searchPage/{project_id}/{name}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsAttendanceController@search',
    ]); 
	 
	
});

