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

Route::get('/', 'MainController@index');
Route::get('/user', 'MainController@user');
Route::get('/page/{id}', 'MainController@page')->name('page');
Route::get('/group/{id}', 'MainController@group')->name('group');
Route::get('/facebook/callback', 'MainController@callback');
