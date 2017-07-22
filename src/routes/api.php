<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group(['middleware' => 'api'], function() {

	Route::get('selling-items', 'SellsController@fetchItemPosted');
	Route::get('sell/{sell}', 'SellsController@show');

	Route::group(['middleware' => 'auth:api'], function () {

		Route::get('sell', 'SellsController@index');
		Route::get('sell-item-by-user', 'SellsController@fetchItemByUser');
		Route::post('sell', 'SellsController@store');
		Route::get('sell/{sell}/edit', 'SellsController@edit');
		
		Route::post('sell/{sell}/upload-photo', 'PhotoController@saveAvatar');
		
		Route::put('sell/{sell}', 'SellsController@update');
		Route::put('sell-change-status/{sell}/{status}', 'SellsController@changeStatus');

		Route::post('sellreview/{sell}', 'SellReviewsController@store');
	});
});