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
    Route::post('/', 'App\Http\Controllers\ApiController@indexProduct');
    Route::post('add', 'App\Http\Controllers\ApiController@createProduct');
    Route::post('update/{id}', 'App\Http\Controllers\ApiController@updateProduct');
    Route::post('delete/{id}', 'App\Http\Controllers\ApiController@deleteProduct');
});

Route::group(['prefix' => 'store'], function () {
    Route::post('/', 'App\Http\Controllers\ApiController@indexStore');
    Route::post('add', 'App\Http\Controllers\ApiController@createStore');
    Route::post('update/{id}', 'App\Http\Controllers\ApiController@updateStore');
    Route::post('delete/{id}', 'App\Http\Controllers\ApiController@deleteStore');
});
