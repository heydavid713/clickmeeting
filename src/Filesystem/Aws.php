<?php

namespace ClickMeeting\Filesystem;

use Aws\S3\S3Client;
use League\Flysystem\AwsS3v3\AwsS3Adapter;

class Aws extends FilesystemAbstract
{
    private $bucket;
    private $amzKey;
    private $amzSecret;
    private $amzRegion;

    public function __construct($bucket, $amzKey, $amzSecret, $amzRegion)
    {
        parent::__construct();

        $this->bucket = $bucket;
        $this->amzKey = $amzKey;
        $this->amzSecret = $amzSecret;
        $this->amzRegion = $amzRegion;
    }

    /**
     * Stores the meeting video on AWS S3.
     *
     * @return [type] [description]
     */
    public function store(int $meetingId, int $sessionId)
    {
        $bucket = $this->bucket;
        $amzKey = $this->amzKey;
        $amzSecret = $this->amzSecret;
        $amzRegion = $this->amzRegion;

        $request = new \GuzzleHttp\Psr7\Request('GET', $this->url);

        $promise = $this->client->sendAsync()->then(function ($response) use ($bucket, $amzKey, $amzSecret, $amzRegion) {
        //upload to AWS
        //
          $client = S3Client::factory([
              'credentials' => [
                  'key' => $amzKey,
                  'secret' => $amzSecret,
              ],
              'region' => $amzRegion,
          ]);

          $adapter = new AwsS3Adapter($client, $bucket);

          $adapter->writeStream('name',$response);
      });

        $promise->wait();
    }
}
