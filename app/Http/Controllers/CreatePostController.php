<?php

namespace App\Http\Controllers;

use App\Posts;
use Aws\S3\S3Client;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CreatePostController extends Controller
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

    public function get()
    {
        return view('createPost');
    }

    public function post(Request $request): string
    {
        $image_name = Carbon::now()->timestamp . '_' . $request->input('image_name');

        $this->posts->pid = uniqid();
        $this->posts->title = $request->input('title');
        $this->posts->image_name = $image_name;
        $this->posts->body = $request->input('body');
        $this->posts->save();

        $cmd = $this->client->getCommand('PutObject', [
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'images/' . $image_name
        ]);

        return $this->client->createPresignedRequest($cmd, '+20 minutes')->getUri();
    }
}
