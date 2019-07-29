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

Route::get('/', 'HomeController@index')->middleware('auth');

Route::get('/users', 'UserController@index')->middleware('auth')->name('users.list');
Route::get('/users/{id}', 'UserController@view')->middleware('auth')->name('users.view');
Route::get('/users/create', 'UserController@create')->middleware('auth')->name('users.create');
Route::get('/users/edit/{id}', 'UserController@edit')->middleware('auth')->name('users.edit');
Route::post('/users/create', 'UserController@store')->middleware('auth')->name('users.store');
Route::delete('/users/delete/{id}', 'UserController@destroy')->middleware('auth')->name('users.destroy');
Route::resource('phones', 'BlockedPhoneController')->middleware('auth');
Route::get('/payers', 'PayerController@index')->middleware('auth')->name('payers.index');
Route::get('/payers/{id}', 'PayerController@show')->middleware('auth')->name('payers.show');
Route::resource('configs', 'ConfigController')->middleware('auth');
Route::resource('filials', 'FilialController')->middleware('auth');
Route::get('terminals/ostatki', 'TerminalController@getOstatki')->middleware('auth');
Route::resource('terminals', 'TerminalController')->middleware('auth');
Route::resource('loans', 'LoanController')->middleware('auth');
Route::resource('incassations', 'IncassationController')->middleware('auth');
Route::resource('payments', 'PaymentController')->middleware('auth');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
