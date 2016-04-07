<?php

Route::get('/', ['as' => 'home', 'uses' => function ()
{
	return view('home');
}]);

Route::get('/makehash', function ()
{
	return Hash::make(Request::get('hash'));
});

Route::group(['prefix' => 'paintings', 'middleware' => ['web', 'auth']], function ()
{
	Route::get('', ['uses' => 'PaintingsController@showSearch', 'as' => 'search']);
	Route::get('search', ['uses' => 'PaintingsController@doSearch', 'as' => 'handleSearch']);

	Route::get('{painting}', ['uses' => 'PaintingsController@showSinglePainting', 'as' => 'singlePainting']);
});

Route::group(['middleware' => 'web', 'namespace' => 'Auth'], function ()
{
	Route::get('login', ['uses' => 'AuthController@showLogin', 'as' => 'login']);
	Route::post('login', ['uses' => 'AuthController@doLogin', 'as' => 'handleLogin']);
	Route::get('logout', ['uses' => 'AuthController@doLogout', 'as' => 'logout']);

	Route::group(['middleware' => 'auth'], function ()
	{
		Route::get('register', ['uses' => 'AuthController@showRegister', 'as' => 'register']);
		Route::post('register', ['uses' => 'AuthController@doRegister', 'as' => 'handleRegister']);
	});
});
