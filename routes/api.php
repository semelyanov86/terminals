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

Route::middleware('auth:api')->get('/user', 'TerminalApiController@user');

Route::group(['prefix' => 'payments'], function() {
   Route::post('/', 'PaymentController@store')->middleware('auth:api');
});
Route::get('/activate', 'ConfigController@activate')->middleware('auth:api');