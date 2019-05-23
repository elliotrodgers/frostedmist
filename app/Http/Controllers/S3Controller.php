<?php

namespace App\Http\Controllers;

use Aws\S3\S3Client;

class S3Controller extends Controller
{
    /**
     * @var S3Client
     */
    private $client;

    public function __construct()
    {
        $this->client = new S3Client([
            'region' => env('AWS_DEFAULT_REGION'),
            'version' => 'latest',
        ]);
    }

    public function deleteImages($image_names)
    {
        if($image_names) {
            foreach ($image_names as $image_name) {
                $this->client->deleteObject([
                    'Bucket' => env('AWS_BUCKET'),
                    'Key'    => 'images/' . $image_name
                ]);
            }
        }
    }

    public function createPresignedUrls($image_names): array
    {
        $image_presigned_urls = [];
        if($image_names) {
            foreach ($image_names as $image_name) {

                $cmd = $this->client->getCommand('PutObject', [
                    'Bucket' => env('AWS_BUCKET'),
                    'Key' => 'images/' . $image_name
                ]);

                $image_presigned_urls[] = (string) $this->client->createPresignedRequest($cmd, '+20 minutes')->getUri();
            }
        }

        return $image_presigned_urls;
    }
}
