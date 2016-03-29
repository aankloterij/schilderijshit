<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Auth\DynamicUserProvider;
use App\User;

class DynamicAuthServiceProvider extends ServiceProvider
{
	public function boot()
	{
		$this->app['auth']->provider('dynamic', function ($app, array $config)
		{
			return new DynamicUserProvider($app['hash'], User::class);
		});
	}

	public function register()
	{
		//
	}
}