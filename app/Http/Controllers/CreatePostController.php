<?php

namespace App\Http\Controllers;

use App\Posts;
use Aws\S3\S3Client;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CreatePostController extends Controller
{
    /**
     * @var Posts
     */
    private $posts;

    /**
     * @var PostsController
     */
    private $postsController;

    public function __construct(Posts $posts, PostsController $postsController)
    {
        $this->posts = $posts;
        $this->postsController = $postsController;
    }

    public function get()
    {
        if(!Session::get('logged_in')) {
            return abort(401);
        }
        return view('createPost');
    }

    public function post(Request $request)
    {
        $image_names = $request->input('image_names');
        $image_presigned_urls = [];

        if($image_names) {
            foreach ($image_names as &$image_name) {
                $image_name = Carbon::now()->timestamp . '_' . $image_name;
                $image_presigned_urls[] = $this->postsController->getPresignedUrl($image_name);
            }
        }

        $this->posts->insertUpdatePost(
            uniqid(),
            $request->input('title'),
            $image_names,
            $request->input('body')
        );

        return $image_presigned_urls;
    }
}
