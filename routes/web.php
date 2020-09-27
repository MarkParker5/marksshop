<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

//Main
	 //get
Route::get('/', 				'MainController@index');
Route::get('/shop', 			'MainController@shop');
Route::get('/category/{slug}',  'MainController@category');
Route::get('/product/{slug}',   'MainController@product');
Route::get('/tag/{slug}',  		'MainController@tag');

Route::post('/product/{slug}',  'MainController@getReview');

	 //cart

Route::post('/cart/add', 		'CartController@add');
Route::post('/cart/clear', 		'CartController@clear');
Route::post('/cart/delete', 	'CartController@delete');

Route::get('/checkout', 		'CartController@checkout');
Route::get('/end-checkout', 	'CartController@endCheckout');

//Admin
Route::group([
	'prefix' => '/admin',
	'namespace' => 'Admin',
	'middleware'=> ['auth', 'admin'],
	], function(){
		Route::get('/', 'AdminController@index');
		Route::resource('/category',  'CategoryController');
		Route::resource('/product',   'ProductController');
		Route::resource('/tag',  	  'TagController');
		Route::resource('/slide',     'SliderController');
});


Auth::routes();

Route::get('/home', 'MainController@index')->name('home');
