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

Route::get('/', 'GuestController@index');


Route::get('/table', 'TableController@index');

Route::get('/rejestracja', 'AccountController@create');
Route::post('/rejestracja', 'AccountController@store');

Route::get('/login', 'SessionController@create');
Route::get('/logout', 'SessionController@destroy');
