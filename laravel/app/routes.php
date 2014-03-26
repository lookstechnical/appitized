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

Route::get('/', function()
{
	//var_dump(new Response());
	//die();
	$lang = Input::get('lang');
	
	$planets = Planet::with('satellites')->with('type')->with('gasses')->remember(30)->get();
	
	$pArray = array();
	$pArray['plannets'] = $planets->toArray();
	
	switch($lang) {
		case 'json':
			return Response\Api::json($pArray);
		break;
		case 'xml':
			return Response\Api::xml($planets->toArray());
		break;
		case 'csv':
			return Response\Api::csv($planets->toArray());
		break;
		default:
			return Response\Api::json($pArray);
	}
});