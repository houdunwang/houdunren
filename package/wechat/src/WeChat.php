<?php namespace Houdunwang\WeChat;

use Houdunwang\WeChat\Build\Base;

/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class WeChat
{
    //连接
    protected static $link;
    //配置
    protected static $config;

    public static function single()
    {
        if (is_null(self::$link)) {
            self::$link = new Base();
        }

        return self::$link;
    }

    public static function config(array $config)
    {
        self::$config = $config;
    }

    /**
     * @return array
     */
    public static function getConfig($name)
    {
        return self::$config[$name];
    }

    public function __call($method, $params)
    {
        return call_user_func_array([self::single(), $method], $params);
    }

    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([self::single(), $name], $arguments);
    }
}
