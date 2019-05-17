<?php

return [
    'gallery' => env('LAMBDA_PREFIX') . '/',
    'createPost' => env('LAMBDA_PREFIX') . '/createPost',
    'editPost' => env('LAMBDA_PREFIX') . '/editPost/',
    'deletePost' => env('LAMBDA_PREFIX') . '/deletePost',
    'login' => env('LAMBDA_PREFIX') . '/login',
];