<?php

namespace Houdunwang\WeChat;

use Log;

class WeChat
{
    public $message = [];

    public function __construct()
    {
        $this->bind();

        $this->message = $this->getMessage();
    }

    public function getMessage()
    {
        $content = file_get_contents('php://input');

        return simplexml_load_string($content, 'SimpleXMLElement', LIBXML_NOCDATA);
    }

    public function bind()
    {
        if (isset($_GET["signature"]) && isset($_GET["timestamp"]) && isset($_GET["nonce"]) && isset($_GET['echostr'])) {
            $signature = $_GET["signature"];
            $timestamp = $_GET["timestamp"];
            $nonce = $_GET["nonce"];
            $token = config('houdunwang.wechat.token');
            $tmpArr = array($token, $timestamp, $nonce);
            sort($tmpArr, SORT_STRING);
            $tmpStr = implode($tmpArr);
            $tmpStr = sha1($tmpStr);
            if ($tmpStr == $signature) {
                die($_GET['echostr']);
            } else {
                return false;
            }
        }
    }

    public function __get($name)
    {
        return $this->message->$name ?? null;
    }
}
