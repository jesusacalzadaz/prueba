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


Route::post('/login', ['uses'=>'App\Http\Controllers\AuthController@login']);
Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/regions', ['uses'=>'App\Http\Controllers\RegionController@list']);
    Route::get('/communes/{id}', ['uses'=>'App\Http\Controllers\CommuneController@list']);

    Route::get('/customer/bydni/{dni}', ['uses'=>'App\Http\Controllers\CustomerController@consultDniEmail'])->where('dni', '[0-9A-Za-z\-]+');
    Route::get('/customer/byemail/{email}', ['uses'=>'App\Http\Controllers\CustomerController@consultDniEmail']);
    Route::post('/customer', ['uses'=>'App\Http\Controllers\CustomerController@create']);
    Route::delete('/customer/bydni/{dni}', ['uses'=>'App\Http\Controllers\CustomerController@deleteDni'])->where('dni', '[0-9A-Za-z\-]+');
    
});
