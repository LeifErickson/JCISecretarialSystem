<?php



Route::group([
    'prefix'     => 'events',
], function() {
    
	 Route::get('/', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@index',
    ]);
	 Route::get('add', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@addEventForm',
    ]);
	 Route::post('addEvent', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@store',
    ]);
	 Route::get('deleteEvent/{id}', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@delete',
    ]);  
	  Route::get('EditProject/{id}', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@updateForm',
    ]);
	  Route::post('updateEvent', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@updateEvent',
    ]);
	 
	
});

