<?php

return [
    'gallery' => env('LAMBDA_PREFIX') . '/',
    'createPost' => env('LAMBDA_PREFIX') . '/createPost',
    'editPost' => env('LAMBDA_PREFIX') . '/editPost/',
    'deletePost' => env('LAMBDA_PREFIX') . '/deletePost',
    'login' => env('LAMBDA_PREFIX') . '/login',
    'logout' => env('LAMBDA_PREFIX') . '/logout',
    'cloudFront' => 'https://d2ht7ubmh9skk9.cloudfront.net/',
];