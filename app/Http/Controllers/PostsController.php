<?php

namespace App\Http\Controllers;

use App\Posts;

class PostsController extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
    }

    public function getPosts()
    {
        $posts = $this->posts->getLatest();
        return view('getPosts', compact('posts'));
    }

    public function createPost()
    {
        return view('createPost');
    }
}
