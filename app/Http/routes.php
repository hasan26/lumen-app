<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->get('/', function () use ($app) {
	return $app->version();
});

$app->group(['prefix' => 'api'], function () use ($app) {

	$app->post('login', function (\Illuminate\Http\Request $request) {

		if ($request->isJson()) {
			$data = $request->json()->all();
		} else {
			$data = $request->all();
		}

		if( $request->json()->get('username') == "employed"){
			$response = array('status' => true, 'message'=>'succes');
		}else{
			$response = array('status' => false, 'message'=>'failed');
		}

		return response()
            ->json($response);

	});

	$app->get('meja','App\Http\Controllers\MejaController@index');
	$app->get('menu','App\Http\Controllers\MenuController@index');
	$app->get('menu/food','App\Http\Controllers\MenuController@food');
	$app->get('menu/drink','App\Http\Controllers\MenuController@drink');
    $app->post('order','App\Http\Controllers\OrderController@newOrder');
	$app->get('order','App\Http\Controllers\OrderController@index');
	$app->get('menu/{id}', [
    	'uses' => 'App\Http\Controllers\MenuController@find'
	]);
    
});