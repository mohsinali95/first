<?php

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

Route::get('/', function () {
    return view('welcome');
});


Route::post('/insertproduct','OrderController@insertProducts');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/order/{id}','OrderController@showProducts');

Route::get('/shops','ShopController@showShops');

