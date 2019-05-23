<?php

namespace App\Http\Controllers;

use App\Posts;
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
     * @var S3Controller
     */
    private $s3Controller;

    public function __construct(Posts $posts, S3Controller $s3Controller)
    {
        $this->posts = $posts;
        $this->s3Controller = $s3Controller;
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
        // Add timestamps to new image names
        $image_names = $request->input('image_names');
        foreach ($image_names as &$image_name) {
            $image_name = Carbon::now()->timestamp . '_' . $image_name;
        }

        // Insert new post
        $this->posts->insertUpdatePost(
            uniqid(),
            $request->input('title'),
            $image_names,
            $request->input('body')
        );

        // Return with presigned urls to upload
        return $this->s3Controller->createPresignedUrls(
            $image_names
        );
    }
}
