<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'product'], function () {
    Route::get('/', 'App\Http\Controllers\ProductController@index');
    Route::post('add', 'App\Http\Controllers\ProductController@add');
    Route::post('update/{id}', 'App\Http\Controllers\ProductController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\ProductController@delete');
});

Route::group(['prefix' => 'store'], function () {
    Route::get('/', 'App\Http\Controllers\StoreController@index');
    Route::post('add', 'App\Http\Controllers\StoreController@add');
    Route::post('update/{id}', 'App\Http\Controllers\StoreController@update');
    Route::delete('delete/{id}', 'App\Http\Controllers\StoreController@delete');
});
