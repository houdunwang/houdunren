<?php

namespace Houdunwang\WeChat;

use Cache;
use Houdunwang\WeChat\Message\MessageType;
use Houdunwang\WeChat\Message\Send;
use Illuminate\Support\Facades\Http;

use Log;

class WeChat
{
    use Send, MessageType;

    protected $message;

    protected $api = 'https://api.weixin.qq.com/cgi-bin';

    public function init()
    {
        $this->bind();
        $this->getMessage();
        return $this;
    }

    public function getMessage()
    {
        $content = file_get_contents('php://input');
        if ($content) {
            return $this->message = simplexml_load_string($content);
        }
    }

    public function token()
    {
        $url = $this->api . '/token?grant_type=client_credential&appid=' . config('houdunren.wechat.appID') . '&secret=' . config('houdunren.wechat.appsecret');

        $cacheName = 'wechat-token-' . md5($url);

        if (!Cache::has($cacheName)) {
            $response = Http::get($url)->throw()->json();

            Cache::put($cacheName, $response['access_token'], now()->addSecond($response['expires_in']));
        }
        return Cache::get($cacheName);
    }

    public function bind()
    {
        if (isset($_GET["signature"]) && isset($_GET["timestamp"]) && isset($_GET["nonce"]) && isset($_GET["echostr"])) {
            $signature = $_GET["signature"];
            $timestamp = $_GET["timestamp"];
            $nonce = $_GET["nonce"];

            $token = config('houdunren.wechat.token');
            $tmpArr = array($token, $timestamp, $nonce);
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
        return $this->message->$name ?? null;
    }

    public function post($url, $postData = [])
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 60);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        if (curl_exec($ch) === false) {
            throw new \Exception(curl_error($ch));
            $data = '';
        } else {
            $data = curl_multi_getcontent($ch);
        }
        curl_close($ch);

        return $data;
    }
}
