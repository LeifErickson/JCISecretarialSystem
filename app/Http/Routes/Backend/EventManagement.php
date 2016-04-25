<?php



Route::group([
    'prefix'     => 'event',
], function() {
    
	 Route::get('/', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@index',
    ]);
	 Route::get('add', [
        'as'   => 'event::dashboard',
        'uses' => '\App\Http\Controllers\Admin\EventsController@add',
    ]);
	
});

