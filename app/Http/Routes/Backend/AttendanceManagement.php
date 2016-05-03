<?php



Route::group([
    'prefix'     => 'attendance',
], function() {
    
	  Route::get('meetingAttendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@meetingAttendance',
    ]);
	  Route::get('eventsAttendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@eventsAttendance',
    ]);
	 
	//ADD events 
	 Route::get('addattendance/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@store',
    ]);
	
	
	
	 
	//DELETE events
	
	 Route::get('deleteattendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@delete',
    ]);  
	 
	 //SEARCH
	  Route::get('searchPage/{project_id}/{name}/{type}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@search',
    ]); 
	 
	
});

