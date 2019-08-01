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

Route::get('/users/create', 'UserController@create')->middleware('auth')->name('users.create');
Route::get('/users/{id}', 'UserController@view')->middleware('auth')->name('users.view');
Route::post('/users/create', 'UserController@store')->middleware('auth')->name('users.store');
Route::get('/users/edit/{id}', 'UserController@edit')->middleware('auth')->name('users.edit');
Route::delete('/users/delete/{id}', 'UserController@destroy')->middleware('auth')->name('users.destroy');
Route::get('/users', 'UserController@index')->middleware('auth')->name('users.list');
Route::resource('phones', 'BlockedPhoneController')->middleware('auth');
Route::get('/payers', 'PayerController@index')->middleware('auth')->name('payers.index');
Route::get('/payers/{id}', 'PayerController@show')->middleware('auth')->name('payers.show');
Route::resource('configs', 'ConfigController')->middleware('auth');
Route::resource('filials', 'FilialController')->middleware('auth');
Route::get('terminals/ostatki', 'TerminalController@getOstatki')->middleware('auth');
Route::resource('terminals', 'TerminalController')->middleware('auth');
Route::resource('loans', 'LoanController')->middleware('auth');
Route::resource('incassations', 'IncassationController')->middleware('auth');
Route::get('payments/dynamic', 'PaymentController@getDynamic')->middleware('auth');
Route::resource('payments', 'PaymentController')->middleware('auth');
Route::post('/search', 'HomeController@search')->middleware('auth')->name('search');
//Route::get('/report/incassation', 'ReportController@incassation')->middleware('auth')->name('report.incassation');
Route::get('/report/incassation', function(\App\DataTables\IncassationDataTable $dataTable) {
    return $dataTable->render('reports.incassation');
})->middleware('auth')->middleware('can:report,App\Incassation')->name('report.incassation');
Route::get('/report/payments', function(\App\DataTables\PaymentDataTable $dataTable) {
    return $dataTable->render('reports.payments');
})->middleware('auth')->middleware('can:report,App\Payment')->name('report.payments');
Route::get('/report/terminals', 'ReportController@terminals')->middleware('auth')->name('report.terminals');
Route::get('/report/filials', 'ReportController@filials')->middleware('auth')->name('report.filials');
Route::get('/report/payers', 'ReportController@payers')->middleware('auth')->name('report.payers');
//Route::get('/report/incassation', 'IncassationReportController@init')->middleware('auth')->name('report.incassation.init');
//Route::get('/report/data/incassation', 'IncassationReportController@data')->middleware('auth')->name('report.incassation.data');
//Route::get('/report/incassation/exportExcel', 'IncassationReportController@exportExcel')->middleware('auth')->name('report.incassation.exportExcel');
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
