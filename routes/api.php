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

Route::get('/carts', 'Api\CartsController@index')->name('carts');
Route::post('/carts/store', 'Api\CartsController@store')->name('carts.store');
Route::post('/carts/update/{id}', 'Api\CartsController@update')->name('carts.update');
Route::post('/carts/delete/{id}', 'Api\CartsController@destroy')->name('carts.delete');