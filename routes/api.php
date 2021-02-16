<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Get all posts
Route::get('/posts', 'ApiController@index');
// Create a post
Route::post('/posts', 'ApiController@create');
// Grab a certain post
Route::get('/posts/{id}', 'ApiController@show');
// Update a certain post
Route::put('/posts/{id}', 'ApiController@update');
// Delete a certain post
Route::delete('/posts/{id}', 'ApiController@delete');