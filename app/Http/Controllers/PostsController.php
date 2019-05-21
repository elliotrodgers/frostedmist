<?php

namespace App\Http\Controllers;

use App\Posts;
use Aws\S3\S3Client;
use BaoPham\DynamoDb\RawDynamoDbQuery;

class PostsController extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    /**
     * @var S3Client
     */
    private $client;

    public function __construct(Posts $posts)
    {
        $this->posts = $posts;
        $this->client = new S3Client([
            'region' => env('AWS_DEFAULT_REGION', 'eu-west-2'),
            'version' => 'latest',
        ]);
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
