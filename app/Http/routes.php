<?php

// Show the main page
Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'web'], function() {

	// Show the dashboard
	Route::get('/dashboard', 'DashboardController@index');

	// Create a new painting
	Route::get('/painting/new', 'PaintingController@showCreateForm');
	Route::post('/painting/new', 'PaintingController@create');

	// Search paintings
	Route::get('/painting/search', 'PaintingController@search');

	Route::get('/api/painting/search', 'API\PaintingController@search');

	Route::get('/painting/search/quick', 'PaintingController@quickSearch');

	// Browse all paintings
	Route::get('/painting/catalog', 'PaintingController@showCatalog');

	Route::get('/painting/{id}', 'PaintingController@get');


	/*
	|--------------------------------------------------------------------------
	| Authentication
	|--------------------------------------------------------------------------
	*/
	Route::get('login', 'Auth\AuthController@showLoginForm');
	Route::post('login', 'Auth\AuthController@login');
	Route::get('logout', 'Auth\AuthController@logout');

	// Registration
	Route::get('register', [
		'uses' => 'Auth\AuthController@showRegistrationForm',
		// 'middleware' => 'auth'
	]);

	Route::post('register', [
		'uses' => 'Auth\AuthController@register',
		// 'middleware' => 'auth'
	]);

	// Password reset
	Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
	Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
	Route::post('password/reset', 'Auth\PasswordController@reset');
});
