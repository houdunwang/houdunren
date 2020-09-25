<?php

namespace Houdunwang\WeChat\Material;

use Http;

trait Preview
{
  public function send(array $data)
  {
    $api = $this->api . '/message/mass/preview?access_token=' . $this->token();
    $response = Http::post($api, $data)
      ->throw()
      ->json();
    return $this->return($response);
  }

  public function image(string $openid, string $mediaId)
  {
    $data = [
      'touser' => $openid,
      'image' => [
        'media_id' => $mediaId,
      ],
      'msgtype' => 'image',
    ];
    return $this->send($data);
  }

  public function voice(string $openid, string $mediaId)
  {
    $data = [
      'touser' => $openid,
      'voice' => [
        'media_id' => $mediaId,
      ],
      'msgtype' => 'voice',
    ];
    return $this->send($data);
  }
}
