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
Route::post('/activate', 'ConfigController@activate')->middleware('auth:api');
Route::post('/loan', 'LoanController@store')->middleware('auth:api');
Route::post('/incassation', 'IncassationController@store')->middleware('auth:api');
Route::get('/generate', 'TerminalApiController@generate')->middleware('auth:api');
Route::post('/state', 'ConfigController@state')->middleware('auth:api');