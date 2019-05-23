<?php

namespace App\Http\Controllers;

use App\Posts;
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
     * @var S3Controller
     */
    private $s3Controller;

    public function __construct(Posts $posts, S3Controller $s3Controller)
    {
        $this->posts = $posts;
        $this->s3Controller = $s3Controller;
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

    public function post(Request $request): array
    {
        // If new images
        $image_names = $request->input('image_names');
        $old_image_names = json_decode($request->input('old_image_names'));

        if($image_names) {

            // Delete old images
            $this->s3Controller->deleteImages(
                $old_image_names
            );

            // Add timestamps to image names
            foreach ($image_names as &$image_name) {
                $image_name = Carbon::now()->timestamp . '_' . $image_name;
            }

            // Update the post
            $this->posts->insertUpdatePost(
                $request->input('pid'),
                $request->input('title'),
                $image_names,
                $request->input('body')
            );

            // Return with presigned urls to upload
            return $this->s3Controller->createPresignedUrls(
                $image_names
            );
        }

        // Update the post
        $this->posts->insertUpdatePost(
            $request->input('pid'),
            $request->input('title'),
            $old_image_names,
            $request->input('body')
        );

        return [];
    }
}
