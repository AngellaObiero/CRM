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

Route::get('/', 'ClientController@index')->middleware('auth');

Auth::routes();

Route::get('/home', 'ClientController@index')->name('home')->middleware('auth');
// Route::get('/clients', 'ClientController@create');
// Route::post('/saveclients', 'ClientController@store');

Route::resource('/clients', 'ClientController')->middleware('auth');
Route::resource('/events', 'EventController')->middleware('auth');
Route::resource('/sms', 'SmsMessageController')->middleware('auth');
Route::get('/event/date/{date}', 'EventController@dateGet')->middleware('auth');
Route::post('/events/store', 'EventController@store')->middleware('auth');
Route::post('/send_sms', 'SmsMessageController@store')->middleware('auth');


Route::get('permissions', 'PermissionController@index')->name('permissions')->middleware('auth');
Route::get('permission/create', 'PermissionController@create')->middleware('auth');
Route::get('permission/edit/{id}', 'PermissionController@edit')->middleware('auth');
Route::post('permission/store', 'PermissionController@store')->middleware('auth');
Route::post('permission/delete/{id}', 'PermissionController@destroy')->middleware('auth');
Route::post('permission/update/{id}', 'PermissionController@update')->middleware('auth');

Route::get('roles', 'RoleController@index')->name('roles')->middleware('auth');
Route::get('role/create', 'RoleController@create')->middleware('auth');
Route::get('role/edit/{id}', 'RoleController@edit')->middleware('auth');
Route::post('role/store', 'RoleController@store')->middleware('auth');
Route::post('role/delete/{id}', 'RoleController@destroy')->middleware('auth');
Route::post('role/update/{id}', 'RoleController@update')->middleware('auth');

Route::get('users', 'UserController@index')->name("users")->middleware('auth');
Route::get('user/create', 'UserController@create')->middleware('auth');
Route::get('user/edit/{id}', 'UserController@edit')->middleware('auth');
Route::post('user/store', 'UserController@store')->middleware('auth');
Route::post('user/delete/{id}', 'UserController@destroy')->middleware('auth');
Route::post('user/update/{id}', 'UserController@update')->middleware('auth');
