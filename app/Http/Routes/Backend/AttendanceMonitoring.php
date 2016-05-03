<?php



Route::group([
    'prefix'     => 'attendanceMonitoring',
], function() {
    
	 Route::get('/{id}', [
        'as'   => 'attendanceMonitoring::dashboard',
        'uses' => '\App\Http\Controllers\Admin\AttendanceMonitoringController@index',
    ]);
	
});

