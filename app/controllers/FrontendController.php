<?php

class FrontendController extends BaseController
{

	public function getFrontend ()
	{
		return View::make( 'frontend' );
	}

}
