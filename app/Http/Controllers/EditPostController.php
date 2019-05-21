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
        $this->posts->pid = $request->input('pid');
        $this->posts->title = $request->input('title');

        $post = $this->posts->where('pid', $this->posts->pid)->first();

        $image_name = $request->input('image_name');
        if($image_name) {
            $this->posts->image_name = Carbon::now()->timestamp . '_' . $image_name;
            $this->client->deleteObject([
                'Bucket' => env('AWS_BUCKET'),
                'Key'    => 'images/' . $post['image_name']
            ]);
        } else {
            $this->posts->image_name = $post['image_name'];
        }

        $this->posts->body = $request->input('body');
        $this->posts->update();

        if(!$image_name) {
            return 'false';
        }

        $cmd = $this->client->getCommand('PutObject', [
            'Bucket' => env('AWS_BUCKET'),
            'Key' => 'images/' . $this->posts->image_name
        ]);

        return $this->client->createPresignedRequest($cmd, '+20 minutes')->getUri();
    }
}
