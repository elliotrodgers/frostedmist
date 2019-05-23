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
     * @var PostsController
     */
    private $postsController;

    /**
     * @var S3Client
     */
    private $client;

    public function __construct(Posts $posts, PostsController $postsController)
    {
        $this->posts = $posts;
        $this->postsController = $postsController;
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
        $image_names = $this->posts->where('pid', $request->input('pid'))->first()['image_names'];

        if($image_names) {
            foreach ($image_names as $image_name) {
                $this->client->deleteObject([
                    'Bucket' => env('AWS_BUCKET'),
                    'Key'    => 'images/' . $image_name
                ]);
            }
        }

        $image_names = $request->input('image_names');
        $image_presigned_urls = [];

        if($image_names) {
            foreach ($image_names as &$image_name) {
                $image_name = Carbon::now()->timestamp . '_' . $image_name;
                $image_presigned_urls[] = $this->postsController->getPresignedUrl($image_name);
            }
        }

        $this->posts->insertUpdatePost(
            $request->input('pid'),
            $request->input('title'),
            $image_names,
            $request->input('body')
        );

        return $image_presigned_urls;
    }
}
