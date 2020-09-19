<?php

namespace Houdunwang\WeChat\User;

use Houdunwang\WeChat\WeChat;
use Illuminate\Support\Facades\Http;
use Log;
use URL;

trait Info
{
  public function get($openid)
  {
    $response = Http::get($this->api . '/user/info?access_token=' . $this->token() . '&openid=' . $openid . '&lang=zh_CN')
      ->throw()
      ->json();
    return $this->return($response);
  }
}
