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

Route::get('/', 'GuestController@index')->name('home');


Route::get('/table', 'TableController@index');



Route::get('/register', 'AccountController@create');

Route::post('/register', 'AccountController@store');

Route::get('/profile/{user}', 'AccountController@show');

Route::get('/profile/{user}/edit', 'AccountController@edit');

Route::post('/profile/{user}/edit', 'AccountController@update');



Route::get('/gallery/{user}', 'GalleryController@show');

Route::get('/gallery/{user}/edit', 'GalleryController@edit');

Route::post('/gallery/{user}/edit', 'GalleryController@update');




Route::get('/login', 'SessionController@create')->name('login');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');
