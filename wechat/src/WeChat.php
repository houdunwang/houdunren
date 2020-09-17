<?php

namespace Houdunwang\WeChat;

use Cache;
use Exception;
use Houdunwang\WeChat\Message\MessageType;
use Houdunwang\WeChat\Message\Send;
use Illuminate\Support\Facades\Http;

use Log;

class WeChat
{
  use Send, MessageType;

  protected $api = 'https://api.weixin.qq.com/cgi-bin';

  protected static $config;

  protected static $message;

  public function init($config)
  {
    $this->config($config);
    $this->bind();
    $this->message();
    return $this;
  }

  public function config($data)
  {
    if (is_string($data)) {
      return self::$config[$data] ?? null;
    } else {
      self::$config = $data;
    }
  }

  public function message()
  {
    $content = file_get_contents('php://input');
    if ($content) {
      self::$message = simplexml_load_string($content);
    }
  }

  public function token()
  {
    $url = $this->api . '/token?grant_type=client_credential&appid=' . $this->config('appID') . '&secret=' . $this->config('appsecret');

    $cacheName = 'wechat-token-' . md5($url);

    if (!Cache::has($cacheName)) {
      $response = Http::get($url)
        ->throw()
        ->json();

      if (isset($response['errcode'])) {
        throw new Exception($response['errmsg']);
      }

      Cache::put($cacheName, $response['access_token'], now()->addSecond($response['expires_in']));
    }
    return Cache::get($cacheName);
  }

  public function bind()
  {
    if (isset($_GET['signature']) && isset($_GET['timestamp']) && isset($_GET['nonce']) && isset($_GET['echostr'])) {
      $signature = $_GET['signature'];
      $timestamp = $_GET['timestamp'];
      $nonce = $_GET['nonce'];

      $token = $this->config('token');
      $tmpArr = [$token, $timestamp, $nonce];
      sort($tmpArr, SORT_STRING);
      $tmpStr = implode($tmpArr);
      $tmpStr = sha1($tmpStr);

      if ($tmpStr == $signature) {
        die($_GET['echostr']);
      }
    }
  }

  public function __get($name)
  {
    if ($name === 'message') {
      return self::$message;
    }
    return self::$message[$name] ?? null;
  }

  protected function return($response)
  {
    if (isset($response['errcode']) && $response['errcode'] != 0) {
      throw new Exception($response['errmsg']);
    }
    return $response;
  }
}
