<?php

Route::get('/', 'PostsController@getPosts');
Route::get('/createPost', 'PostsController@createPost');

Route::view('/login', 'login');

//Auth::routes();
//
//Route::get('/home', 'HomeController@index')->name('home');
