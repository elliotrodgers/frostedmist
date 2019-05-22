<?php

namespace App\Http\Controllers;

use App\Posts;
use Aws\S3\S3Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EditPostController extends Controller
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

    public function get(string $pid)
    {
        if(!Session::get('logged_in')) {
            return abort(401);
        }
        $post = $this->posts->where('pid', $pid)->first();
        $post['pid'] = $pid;
        return view('editPost', compact('post'));
    }

    public function post(Request $request)
    {
        $image_name = $this->posts->where('pid', $request->input('pid'))->first()['image_name'];

        if($request->input('image_name')) {
            $this->client->deleteObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => 'images/' . $image_name
            ]);
            $image_name = Carbon::now()->timestamp . '_' . $request->input('image_name');
        }

        $this->posts->InsertUpdatePost(
            $request->input('pid'),
            $request->input('title'),
            $image_name,
            $request->input('body')
        );

        if(!$request->input('image_name')) {
            return 'false';
        }

        $cmd = $this->client->getCommand('PutObject', [
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'images/' . $image_name
        ]);

        return $this->client->createPresignedRequest($cmd, '+20 minutes')->getUri();
    }
}
