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

Route::get('/', 'MainController@index');
Route::get('/shop', 'MainController@shop');
Route::get('/category/{slug}', 'MainController@category');
Route::get('/product/{slug}', 'MainController@product');
Route::post('/product/{slug}', 'MainController@getReview');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
