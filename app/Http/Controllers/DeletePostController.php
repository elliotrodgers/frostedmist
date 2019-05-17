<?php

namespace App\Http\Controllers;

use App\Posts;
use Aws\S3\S3Client;
use Illuminate\Http\Request;

class DeletePostController extends Controller
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
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
        ]);
    }

    public function post(Request $request)
    {
        $this->posts
            ->where('pid', $request->input('pid'))
            ->first()
            ->delete();

        $this->client->deleteObject([
            'Bucket' => env('AWS_BUCKET'),
            'Key'    => 'images/' . $request->input('image_name')
        ]);

        return;
    }
}
