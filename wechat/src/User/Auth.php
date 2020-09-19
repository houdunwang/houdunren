<?php

namespace Houdunwang\WeChat\User;

use Houdunwang\WeChat\WeChat;
use Illuminate\Support\Facades\Http;
use Log;
use URL;

trait Auth
{
  public function snsapiBase()
  {
    return $this->request('snsapi_userinfo');
  }

  public function snsapiUserInfo()
  {
    $response = $this->request('snsapi_userinfo');
    if (isset($response['openid'])) {
      $api = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $response['access_token'] . '&openid=' . $response['openid'] . '&lang=zh_CN';
      return Http::get($api)
        ->throw()
        ->json();
    }
  }

  protected function request(string $type)
  {
    $status = isset($_GET['code']) && isset($_GET['state']) && $_GET['state'] == 'STATE';
    if ($status) {
      $api = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this->config('appID') . '&secret=' . $this->config('appsecret') . '&code=' . $_GET['code'] . '&grant_type=authorization_code';

      return Http::get($api)
        ->throw()
        ->json();
    } else {
      $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->config('appID') . '&redirect_uri=' . URL::full() . '&response_type=code&scope=' . $type . '&state=STATE#wechat_redirect';

      header('location:' . $url);
      die();
    }
  }
}
