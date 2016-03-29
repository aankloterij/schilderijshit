<?php

namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;

class DynamicUserProvider extends EloquentUserProvider
{
	public function retrieveByCredentials(array $credentials)
    {
    	if (! isset($credentials['id'])) return parent::retrieveByCredentials($credentials);

        // Gebruik id als username, of als email. Return model dat uit de query komt.
        $query = $this->createModel()->newQuery();

        $query
        	->where('username', $credentials['id'])
        	->orWhere('email', $credentials['id']);

        return $query->first();
    }
}