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


/*
 *  Tablica
 *     |
 *     V
 */
Route::get('/table', 'TableController@index');

Route::post('/table/{user}', 'TableController@store');


/*
 *  Rejestracja
 *     |
 *     V
 */
Route::get('/register', 'AccountController@create');

Route::post('/register', 'AccountController@store');

/*
 *  Logowanie
 *     |
 *     V
 */
Route::get('/login', 'SessionController@create')->name('login');

Route::post('/login', 'SessionController@store');

Route::get('/logout', 'SessionController@destroy');


/*
 *  Profil
 *     |
 *     V
 */
Route::get('/profile/{user}', 'AccountController@show');

Route::get('/profile/{user}/edit', 'AccountController@edit');

Route::post('/profile/{user}/edit', 'AccountController@update');


/*
 *  Galeria
 *     |
 *     V
 */
Route::get('/gallery/{gallery}', 'GalleryController@show');



/*
 *  Zdjęcia
 *     |
 *     V
 */
Route::get('/photo/create', 'PhotoController@create');

Route::post('/photo/create', 'PhotoController@store');

Route::get('/photo/{photo}', 'PhotoController@show');



/*
 *  Zmiana Avatara
 *        |
 *        V
 */
Route::get('/avatar/{photo}', 'AvatarController@edit');



