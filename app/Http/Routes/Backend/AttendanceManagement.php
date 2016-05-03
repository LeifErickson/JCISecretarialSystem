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
	 
	//EVENTS ATTENDANCE ROUTE
	 Route::get('addattendance/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@storeEvents',
    ]);
	
	
	 Route::get('deleteattendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@deleteEvents',
    ]);  
	 
	  Route::get('searchPage/{project_id}/{name}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@searchEvents',
    ]); 
	 //MEETING ATTENDANCE ROUTE
	 
	 
	 
	 //PROJECTS ATTENDANCE ROUTE
	
});

