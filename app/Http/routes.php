<?php

Route::get('/', 'HomeController@index');

Route::group(['middleware' => 'web'], function() {
    Route::auth();

    Route::get('/dashboard', 'DashboardController@index');
});
