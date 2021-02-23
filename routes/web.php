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
Route::get('/login', 'LoginController@index')->name('login');
Route::post('/login', 'LoginController@store');


// Logout
Route::post('/logout', 'LogoutController@index');


// Posts
Route::get('/posts', 'PostController@index');
Route::post('/post', 'PostController@store');
Route::get('/posts/create', 'PostController@create')->name('create');
Route::delete('/posts/{id}', 'PostController@destroy');
// Post for main post to display

// Posts Edit
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/update/{id}', 'PostController@edit');
Route::put('/posts/update/{id}', 'PostController@update');

Route::get('/userposts', 'UserController@show');
Route::get('/userposts', 'UserController@show')->middleware('auth');

// Comments
Route::get('/comments', 'CommentController@index');
Route::post('/comments/store/{id}', 'CommentController@store');

// Excel export
Route::get('/exportUser', 'ExportController@exportUser')->name('exportUser');
Route::get('/exportPost', 'ExportController@exportPost')->name('exportPost');
