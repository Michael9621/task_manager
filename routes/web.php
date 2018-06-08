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
Route::get('/','TasksController@index');

Auth::routes();

Route::get('/verify/{token}', 'verifyController@verify')->name('verify');


Route::get('/task','TasksController@add');
Route::post('/task','TasksController@create');

Route::get('/task/{task}','TasksController@edit');
Route::post('/task/{task}','TasksController@update');

Route::get('/status/{task}','TasksController@edit_status');
Route::post('/status/{task}','TasksController@update_status');


Route::get('/staff','StaffController@add');
Route::post('/staff','StaffController@create');

Route::get('/staff/{staff}','StaffController@edit');
Route::post('/staff/{staff}','StaffController@update');



Route::get('/client','ClientController@add');
Route::post('/client','ClientController@create');

Route::get('/client/{client}','ClientController@edit');
Route::post('/client/{client}','ClientController@update');

Route::get('/job','JobController@add');
Route::post('/job','JobController@create');

Route::get('/job/{job}','JobController@edit');
Route::post('/job/{job}','JobController@update');
