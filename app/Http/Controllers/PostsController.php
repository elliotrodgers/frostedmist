<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    /**
     * @var Storage
     */
    private $storage;

    public function __construct(Posts $posts, Storage $storage)
    {
        $this->posts = $posts;
        $this->storage = $storage;
    }

    public function index()
    {
        $posts = $this->posts->getLatest();
        return view('posts', compact('posts'));
    }
}
