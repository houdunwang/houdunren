<?php namespace Houdunwang\Aliyun\Live;

use Houdunwang\Aliyun\Aliyun;

/** .-------------------------------------------------------------------
 * |  Software: [HDCMS framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
class App
{
    /**
     * 获取直播推流与播放流地址
     *
     * @param string $url 地址
     * @param string $key 密钥
     * @param int $hour 鉴权有效时间，超过这个时间不允许OBS等软件进行推流
     *
     * @return string
     */
    public static function url($url, $key, $hour)
    {
        $param = parse_url($url);
        $time = strtotime("+{$hour} hours");
        $key = $key;
        $domain = "{$param['scheme']}://{$param['host']}";
        $filename = $param['path'];
        $sstring = $filename . "-" . $time . "-0-0-" . $key;
        $md5 = md5($sstring);
        $auth_key = "auth_key=" . $time . "-0-0-" . $md5;

        return $domain . $filename . "?" . $param['query'] . "&" . $auth_key;
    }
}
