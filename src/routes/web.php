<?php

Auth::routes();

Route::get('/logout', 'Auth\LoginController@logout');
Route::get('/', 'PageController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {
	
	Route::get('/globe/subscribe', 'GlobeLabController@subscribe');
});

/*Route::get('/home', 'HomeController@index')->name('homepage');


Route::post('photo/saveavatar', 'PhotoController@saveavatar')->name('photo.saveavatar');

Route::get('sell/{sell}/photo', 'SellsController@photo')->name('sell.photo');
Route::post('sellreview/{sell}', 'SellReviewsController@store')->name('sellreview.store');
Route::resource('sell', 'SellsController');


Route::resource('buyer', 'BuyersController');*/



#Route::resource
/*Route::get('/sell', 'SellsController@index')->name('sell');
Route::get('/sell/create', 'SellsController@create')->name('sell_create');
Route::post('/sell', 'SellsController@store');
Route::get('/sell/{data}', 'SellsController@show');
Route::get('/sell/{id}/edit', 'SellsController@edit')->name('sell_edit');
Route::post('/sell/{id}', 'SellsController@update')->name('sell_update');*/

/*Auth::routes();
Route::get('/buyer', 'BuyersController@index')->name('buyer');
Route::get('/buyer/create', 'BuyersController@create')->name('buyer_create');*/

