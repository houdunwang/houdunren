<?php

namespace Houdunwang\WeChat\Button;

use Exception;
use Houdunwang\WeChat\WeChat;
use Illuminate\Support\Facades\Http;
use GuzzleHttp\Client;
use Log;

trait Create
{
  public function create($button)
  {
    $url = $this->api . '/menu/create?access_token=' . $this->token();

    $response = Http::send('POST', $url, ['body' => json_encode($button, JSON_UNESCAPED_UNICODE)])
      ->throw()
      ->json();

    if ($response['errmsg'] != 'ok') {
      throw new Exception($response['errmsg']);
    }
    return true;
  }
}
