<?php
/**
 * Created by PhpStorm.
 * User: seb
 * Date: 3/18/19
 * Time: 1:55 PM
 */

require_once "vendor/autoload.php";

date_default_timezone_set("Europe/Paris");

class Minio
{
    private $s3;

    public function __construct()
    {
        $this->s3 = new Aws\S3\S3Client([
            'version' => 'latest',
            'region' => 'eu-west-1',
            'endpoint' => 'http://minio:9000',
            'use_path_style_endpoint' => true,
            'credentials' => [
                'key' => 'FN1E9STQYQ9LE077SNWC',
                'secret' => 'ThgAalM0ljoXhRHenaXdjxHHvT596706gS0Reuiv',
            ],
        ]);
        //Init bucket
        $this->initBuckets();

    }

    private function initBuckets($bucket='img-produits')
    {
        if (empty($this->s3->listBuckets()->get('Buckets'))) {
            $this->s3->createBucket([
                'Bucket' => $bucket
            ]);
        }
    }

    public function getObject($key, $bucket='img-produits'){
        return $this->s3->getObject([
            'Bucket' => $bucket,
            'Key'    => $key,
        ])["Body"];
    }

    public function putObject($key, $body, $bucket='img-produits'){
        $this->s3->putObject([
            'Bucket' => $bucket,
            'Key'    => $key,
            'Body'   => fopen($body, 'r'),
        ]);
    }

    public function deleteObject($key, $bucket='img-produits'){
        $this->s3->deleteObject([
            'Bucket' => $bucket,
            'Key' => $key,
        ]);
    }
}
