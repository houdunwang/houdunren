<?php

namespace Houdunwang\WeChat;

use Houdunwang\WeChat\MessageType\Base;
use Houdunwang\WeChat\MessageType\Button;
use Houdunwang\WeChat\MessageType\Event;
use Log;

/**
 * 消息类型
 * @package Houdunwang\WeChat\Types
 */
class MessageType
{
    use Base, Button, Event;

    /**
     * 获取所有类型检测方法
     * @return array
     */
    final public function getAllTypeCheckMethods(): array
    {
        $methods = [];
        foreach (get_class_methods(self::class) as $method) {
            if (preg_match("/^is/", $method)) {
                array_push($methods, $method);
            }
        }
        return $methods;
    }
}
