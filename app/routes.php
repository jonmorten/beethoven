<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//	Frontend
Route::get( '/', 'FrontendController@getFrontend' );

//	Board API
Route::get( 'api/board/get/{id}', 'BoardController@getBoard' );
Route::get( 'api/board/new', 'BoardController@newBoard' );
Route::get( 'api/board/patch/{id}', 'BoardController@patchBoard' );
