<?php

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'web'], function() {

    Route::get('/dashboard', 'DashboardController@index');

    Route::get('login', 'Auth\AuthController@showLoginForm');
    Route::post('login', 'Auth\AuthController@login');
    Route::get('logout', 'Auth\AuthController@logout');

    // Registration Routes...
    Route::get('register', [
    	'uses' => 'Auth\AuthController@showRegistrationForm',
    	'middleware' => 'auth'
    ]);

    Route::post('register', [
    	'uses' => 'Auth\AuthController@register',
    	'middleware' => 'auth'
    ]);

    // Password Reset Routes...
    Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
    Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
    Route::post('password/reset', 'Auth\PasswordController@reset');
});
