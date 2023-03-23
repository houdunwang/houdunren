<?php

namespace Houdunwang\Wechat;

use Exception;
use Houdunwang\Wechat\Message\MessageType;
use Houdunwang\Wechat\Message\Send;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Log;
use SimpleXMLElement;
use Mtownsend\XmlToArray\XmlToArray;

class Wechat
{
    use Send, MessageType;

    protected $api = 'https://api.weixin.qq.com/cgi-bin';

    //微信配置
    protected static $config;

    //被动消息
    protected static $message;

    /**
     * 微信配置
     * @param mixed $data
     * @return mixed
     */
    public function config($data)
    {
        if (is_string($data)) {
            return self::$config[$data] ?? null;
        } else {
            self::$config = $data;
        }
        return $this->bind()->message();
    }

    /**
     * 被动消息
     * @return $this
     */
    protected function message()
    {
        $content = file_get_contents('php://input');
        if ($content) self::$message = json_decode(json_encode(@simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA)), true);
        return $this;
    }

    /**
     * 微信token缓存
     * @return mixed
     * @throws RequestException
     * @throws Exception
     */
    public function token()
    {
        $url = $this->api . '/token?grant_type=client_credential&appid=' . $this->config('appid') . '&secret=' . $this->config('appsecret');
        $cacheName = 'wechat-token-cache';
        if (!Cache::has($cacheName)) {
            $res = Http::get($url)->throw()->json();
            $response = $this->return($res);
            Cache::put($cacheName, $response['access_token'], now()->addSeconds($response['expires_in']));
        }
        return Cache::get($cacheName);
    }

    /**
     * 绑定公众号
     * @return $this
     */
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
            Log::error('微信绑定失败');
            die;
        }
        return $this;
    }

    /**
     * 获取被动消息内容
     * @param mixed $name
     * @return static|null|SimpleXMLElement
     */
    public function __get($name)
    {
        if ($name === 'message') {
            return self::$message;
        }
        return self::$message[$name] ?? null;
    }

    /**
     * 微信返回消息格式化
     * @param mixed $response
     * @return mixed
     * @throws Exception
     */
    protected function return($response)
    {
        $errors = include __DIR__ . '/data/errors.php';
        if (isset($response['errcode']) && $response['errcode'] != 0) {
            throw new Exception($errors[$response['errcode']] ?? $response['errmsg']);
        }
        return $response;
    }
}
