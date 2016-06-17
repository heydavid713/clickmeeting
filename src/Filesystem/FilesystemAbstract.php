<?php

namespace ClickMeeting\Filesystem;

abstract class FilesystemAbstract
{
    protected $guzzleClient;

  /**
   * API url.
   *
   * @var string
   */
  protected $url = 'https://api.clickmeeting.com/v1/';

  /**
   * API key.
   *
   * @var string
   */
  protected $api_key = null;

    public function __construct(array $params)
    {
        $this->url = isset($params['url']) ? $params['url'] : $this->url;
        $this->api_key = isset($params['api_key']) ? $params['api_key'] : $this->api_key;

        $client = new GuzzleHttp\Client();
    }
}
