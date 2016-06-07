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

Route::get('', 'HomeController@showWelcome');

Route::group(array('before' => 'auth'), function()
{
	Route::get('authenticated', 'HomeController@showAuthenticated');
//	Route::post('admin/gallery/{product_image}/delete', 'GalleryController@destroy');
//	Route::resource('admin/gallery', 'GalleryController');
//	Route::resource('admin/banner', 'BannerController');
//	Route::get('admin/products/edit/{slug}', 'ProductController@editProduct');
//	Route::post('admin/products/action/edit', 'ProductController@editAction');
//	Route::post('admin/products/action/edit-product-image', 'ProductController@editProductImages');
//	Route::post('admin/products/add', 'ProductController@addProduct');
//	Route::get('admin/home', 'ProfileController@index');
//	Route::post('admin/preview', 'ProfileController@preview');
//	Route::get('admin/edit-image', 'GalleryController@editImage');
//	Route::post('admin/edit-image/action', 'GalleryController@editImageAction');
});

//Route::get('/{id}', 'PostController@showPost');
//Route::get('login', 'SessionsController@showLogin');
//Route::post('login', 'SessionsController@doLogin');
//Route::get('logout', 'SessionsController@doLogout');
//Route::get('apeaje', 'ProfileController@returnSesuatu');

Route::get('login', array('uses' => 'HomeController@showLogin'));

// route to process the form
Route::post('login', array('uses' => 'HomeController@doLogin'));
