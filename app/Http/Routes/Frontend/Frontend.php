<?php

/**
 * Frontend Controllers
 */
Route::get('/', 'FrontendController@index')->name('frontend.index');
Route::get('/activeMembers', 'FrontendController@activeMember');
//Route::get('macros', 'FrontendController@macros')->name('frontend.macros');

Route::group([
    'prefix'     => 'post',
], function() {
    Route::get('event/{id}', [
        'uses' => '\App\Http\Controllers\Frontend\FrontendController@eventPost',
    ]);
	  Route::get('project/{id}', [
        'uses' => '\App\Http\Controllers\Frontend\FrontendController@projectPost',
    ]);
	  Route::get('meeting/{id}', [
        'uses' => '\App\Http\Controllers\Frontend\FrontendController@meetingPost',
    ]);
 });
/**
 * These frontend controllers require the user to be logged in
 */
Route::group(['middleware' => 'auth'], function () {
    Route::group(['namespace' => 'User'], function() {
        Route::get('dashboard', 'DashboardController@index')->name('frontend.user.dashboard');
        Route::get('profile/edit', 'ProfileController@edit')->name('frontend.user.profile.edit');
        Route::patch('profile/update', 'ProfileController@update')->name('frontend.user.profile.update');
    });
});