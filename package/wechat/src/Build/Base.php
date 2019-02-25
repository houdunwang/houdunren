<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build;

use GuzzleHttp\Client;
use Houdunwang\WeChat\Build\Common\Error;
use Houdunwang\WeChat\Build\Common\Sign;
use Houdunwang\WeChat\Build\Common\Xml;

/**
 * 公共处理类
 * Class Base
 * @package Houdunwang\WeChat\Build
 */
class Base extends Error
{
    use Xml, Sign;
    //配置
    protected static $config;
    protected $appid;
    protected $appsecret;
    //验证令牌
    protected $accessToken;
    //微信服务器发来的数据
//    protected $message;
    //API 根地址
    protected $apiUrl = 'https://api.weixin.qq.com';

    /**
     * 设置配置项
     * @param $config
     * @return $this
     */
    public function config($config)
    {
        self::$config = $config;
        return $this;
    }

    /**
     * 获取配置项
     * @param $name
     * @param string $default
     * @return string
     */
    public static function getConfig($name, $default = '')
    {
        return self::$config[$name] ?? $default;
    }

    /**
     * 获取微信消息内容
     * @param string|null $key
     * @return string
     */
    public function getMessage(string $key = null): ?object
    {
        static $message = [];
        if (!$message) {
            $content = file_get_contents('php://input');
            $xml_parser = xml_parser_create();
            if (!xml_parse($xml_parser, $content, true)) {
                xml_parser_free($xml_parser);
                return null;
            } else {
                $message = simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA);
            }
        }
        if ($key) {
            return isset($message[$key]) ? $message[$key] : null;
        }
        return $message;
    }

    /**
     * 获取消息内容
     * @param string $name
     * @return string
     */
    public function __get(string $name)
    {
        $message = $this->getMessage();
        return isset($message->$name) ? $message->$name : null;
    }

    /**
     * 获取指定消息内容
     * @param string $name
     * @return string|null
     */
    public function content(string $name): ?string
    {
        $message = $this->getMessage();
        return isset($message->$name) ? $message->$name : null;
    }

    /**
     * 获取消息类型
     * @return string|null
     */
    public function getMessageType(): ?string
    {
        //事件消息时取Event属性做为消息类型
        $message = $this->getMessage();
        return $message->MsgType == 'event' ? $message->Event : $message->MsgType;
    }

    /**
     * 微信接口整合验证进行绑定
     * @return bool
     */
    public function valid(): bool
    {
        $status = !isset($_GET["echostr"]) || !isset($_GET["signature"])
            || !isset($_GET["timestamp"]) || !isset($_GET["nonce"]);
        if ($status) {
            return false;
        }
        $echoStr = $_GET["echostr"];
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
        $token = $this->getConfig('token');
        $tmpArr = [$token, $timestamp, $nonce];
        sort($tmpArr, SORT_STRING);
        $tmpStr = implode($tmpArr);
        $tmpStr = sha1($tmpStr);
        if ($tmpStr == $signature) {
            echo $echoStr;
            exit;
        } else {
            return false;
        }
    }

    /**
     * 设置accessToken
     * @param bool $force 强制设置
     * @return mixed
     * @throws \Exception
     */
    public function getAccessToken($force = false)
    {
        static $accessToken;
        $cacheInstance = new Cache;
        if (!$accessToken) {
            $cacheName = 'wechat' . $this->getConfig('appid') . $this->getConfig('appsecret');
            $cachePath = $this->getConfig('cache_path', 'cache/weChat');
            $data = $cacheInstance->dir($cachePath)->get($cacheName);
            if ($force === true || !$data) {
                $url = $this->apiUrl . '/cgi-bin/token?grant_type=client_credential&appid=' . $this->getConfig('appid') . '&secret=' . $this->getConfig('appsecret');
                $data = json_decode(Curl::get($url), true);
                //获取失败
                if (isset($data['errmsg'])) {
                    throw new \Exception($data['errmsg']);
                }
                //缓存access_token
                $cacheInstance->set($cacheName, $data, 7000);
            }
            $accessToken = $data['access_token'];
        }
        return $this->accessToken = $accessToken;
    }

    /**
     * 获取实例
     * @param $api
     * @return mixed
     */
//    public function instance($api)
//    {
//        $class = '\Houdunwang\WeChat\Build\\' . ucfirst($api) . '\\' . ucfirst($api);
//        return new $class();
//    }

    /**
     * 格式化上传素材的数据
     * @param $file
     * @return array
     */
    protected function getPostMedia($file)
    {
        if (class_exists('\CURLFile')) {
            //关键是判断curlfile,官网推荐php5.5或更高的版本使用curlfile来实例文件
            $data = [
                'media' => new \CURLFile (realpath($file)),
            ];
        } else {
            $data = [
                'media' => '@' . realpath($file),
            ];
        }
        return $data;
    }

    /**
     * HTTP Client
     * @return Client
     */
    protected function http()
    {
        return new Client(['base_uri' => $this->apiUrl]);
    }
}
