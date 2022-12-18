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
    Route::post('index', 'ProductController@index');
    Route::get('add', 'ProductController@add');
    Route::post('update/{id}', 'ProductController@update');
    Route::delete('delete/{id}', 'ProductController@delete');
});

Route::group(['prefix' => 'store'], function () {
    Route::post('index', 'StoreController@index');
    Route::get('add', 'StoreController@add');
    Route::post('update/{id}', 'StoreController@update');
    Route::delete('delete/{id}', 'StoreController@delete');
});
