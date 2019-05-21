<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostsController@get')->name('gallery');

Route::get('/createPost', 'CreatePostController@get');
Route::post('/createPost', 'CreatePostController@post');

Route::get('/editPost/{id}', 'EditPostController@get');
Route::post('/editPost/{id}', 'EditPostController@post');

Route::post('/deletePost', 'DeletePostController@post');

Route::get('/login', ['as' => 'login', 'uses' => 'LoginController@get']);
Route::post('/login', ['as' => 'login', 'uses' => 'LoginController@post']);

Route::get('/logout', ['as' => 'login', 'uses' => 'LogoutController@get']);

