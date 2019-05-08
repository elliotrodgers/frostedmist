<?php

Route::get('/', 'PostsController@posts');
Route::get('/createPost', 'PostsController@createPost');