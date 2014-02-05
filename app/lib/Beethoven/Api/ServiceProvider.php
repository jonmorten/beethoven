<?php

namespace Beethoven\Api;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{

	public function register ()
	{
		$this->app->bind( 'BoardHandler', 'Beethoven\Api\Board\Handler' );
	}

}
