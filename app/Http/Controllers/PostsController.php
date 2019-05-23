<?php

namespace App\Http\Controllers;

use App\Posts;
use BaoPham\DynamoDb\RawDynamoDbQuery;

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

    public function get()
    {
        $posts = $this->posts
            ->decorate(function (RawDynamoDbQuery $raw) {
                $raw->query['ScanIndexForward'] = true;
            })
            ->get();

        return view('gallery', compact('posts'));
    }
}
