<?php



Route::group([
    'prefix'     => 'template',
], function() {
    
	 Route::get('/', [
			'as'   => 'template::template',
        'uses' => '\App\Http\Controllers\Admin\TemplateController@header',
    ]);
	 Route::post('saveH', [
			'as'   => 'template::test',
        'uses' => '\App\Http\Controllers\Admin\TemplateController@saveHeader',
    ]);
	
	 Route::get('gallery', [
			'as'   => 'template::template',
        'uses' => '\App\Http\Controllers\Admin\TemplateController@gallery',
    ]);
	  Route::post('saveG', [
			'as'   => 'template::test',
        'uses' => '\App\Http\Controllers\Admin\TemplateController@addgallery',
    ]);
	
});

