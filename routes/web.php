<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('auth.login');
});

// Registration
Route::get('/register', 'RegisterController@index');
Route::post('/register', 'RegisterController@store');

// Login
Route::get('/login', 'LoginController@index');
Route::post('/login', 'LoginController@store');

// Logout
Route::post('/logout', 'LogoutController@index');


// Posts
Route::get('/posts', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::get('/posts/create', 'PostController@create')->name('create');
Route::delete('/posts/{post}', 'PostController@destroy');
// Posts Edit
Route::get('/posts/{id}', 'PostController@edit');
Route::put('/posts/{id}', 'PostController@update');