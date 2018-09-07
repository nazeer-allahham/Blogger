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
Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::post('/search', 'HomeController@search');

Route::get('/profile', 'UsersController@show');
Route::get('/profile/edit', 'UsersController@edit');
Route::post('/profile/edit', 'UsersController@update');

Route::get('/posts', 'PostsController@index');
Route::post('/posts', 'PostsController@store');
Route::post('/posts/{post_id}/like', 'LikesController@store');
Route::get('/posts/{post_id}/', 'PostsController@show');
Route::post('/posts/{post_id}/comments/push', 'CommentsController@store');

// api
Route::get('/users/{user}/gender', 'UsersController@gender');
Route::get('/users/{user}/name', 'UsersController@name');