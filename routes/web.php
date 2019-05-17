<?php

Route::get('/', 'PostsController@get')->name('gallery');;

Route::get('/createPost', 'CreatePostController@get');
Route::post('/createPost', 'CreatePostController@post');

Route::get('/editPost/{id}', 'EditPostController@get');
Route::post('/editPost/{id}', 'EditPostController@post');

Route::post('/deletePost', 'DeletePostController@post');

Route::view('/login', 'login');
