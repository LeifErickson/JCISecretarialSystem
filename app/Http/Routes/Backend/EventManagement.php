<?php



Route::group([
    'prefix'     => 'events',
], function() {
    
	 Route::get('/', [
        'as'   => 'eventsdashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@index',
    ]);
	 Route::get('add', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@addEventForm',
    ]);
	 Route::post('addEvent', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@store',
    ]);
	 Route::get('deleteEvent/{id}', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@delete',
    ]);  
	  Route::get('EditProject/{id}', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@updateForm',
    ]);
	  Route::post('updateEvent', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@updateEvent',
    ]);
	  Route::get('searchPage/{name}', [
        'as'   => 'events::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@search',
    ]); 
	
});

