<?php

namespace App\Http\Controllers;

use App\Posts;
use Illuminate\Http\Request;

class DeletePostController extends Controller
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

    public function post(Request $request)
    {
        $this->posts
            ->where('pid', $request->input('pid'))
            ->first()
            ->delete();

        return $this->s3Controller->deleteImages(
            json_decode($request->input('image_names'))
        );
    }
}
