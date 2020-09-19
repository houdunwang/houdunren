<?php

namespace Houdunwang\WeChat;

use Http;

class SendAllPreview extends WeChat
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
}
