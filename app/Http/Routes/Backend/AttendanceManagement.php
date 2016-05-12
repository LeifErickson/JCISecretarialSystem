<?php



Route::group([
    'prefix'     => 'attendance',
], function() {
	//EVENTS ATTENDANCE ROUTE
	  Route::get('eventsAttendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@eventsAttendance',
    ]);
	 
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
	 Route::get('meetingAttendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@meetingAttendance',
    ]);
	  Route::get('searchMeeting/{project_id}/{name}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@searchMeeting',
    ]); 
	 	 
	 Route::get('addattendanceMeeting/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@storeMeeting',
    ]);
	 
	 Route::get('deleteattendanceMeeting/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@deleteMeeting',
    ]);  
	 
	 
	 //PROJECTS ATTENDANCE ROUTE
	 Route::get('projectsAttendance/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@projectsAttendance',
    ]);
	 Route::get('searchProject/{project_id}/{name}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@searchProject',
    ]); 
	 	 
	 Route::get('addattendanceProject/{project_id}/{member_id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@storeProjects',
    ]);
	 
	 Route::get('deleteattendanceProject/{id}', [
        'as'   => 'attendance::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceController@deleteProject',
    ]);  
	 
});

