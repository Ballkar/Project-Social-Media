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

Route::post('/table/{user}', 'TableController@store');



Route::get('/register', 'AccountController@create');

Route::post('/register', 'AccountController@store');

Route::get('/profile/{user}', 'AccountController@show');

Route::get('/profile/{user}/edit', 'AccountController@edit');

Route::post('/profile/{user}/edit', 'AccountController@update');



Route::get('/gallery/{gallery}', 'GalleryController@show');



Route::get('/photo/create', 'PhotoController@create');

Route::post('/photo/create', 'PhotoController@store');

Route::get('/photo/{photo}', 'PhotoController@show');



Route::get('/avatar/{photo}', 'AvatarController@edit');




Route::get('/login', 'SessionController@create')->name('login');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');
