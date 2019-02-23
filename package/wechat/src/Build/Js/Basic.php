<?php
/** .-------------------------------------------------------------------
 * |  Software: [HDPHP framework]
 * |      Site: www.hdphp.com  www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <2300071698@qq.com>
 * |    WeChat: aihoudun
 * |     Weibo: http://weibo.com/houdunwangxj
 * | Copyright (c) 2012-2019, www.houdunwang.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Houdunwang\WeChat\Build\Js;

use houdunwang\curl\Curl;
use houdunwang\cache\Cache;
use houdunwang\tool\Tool;

/**
 * JSSDK
 * Trait Basic
 *
 * @package Houdunwang\WeChat\Build\button
 */
trait Basic
{
    protected $ticket;

    /**
     * 生成配置参数
     *
     * @return mixed
     * @throws \Exception
     */
    public function config()
    {
        $data['noncestr']     = Tool::randStr(16);
        $data['jsapi_ticket'] = $this->getTicket();
        $data['timestamp']    = time();
        $data['url']          = 'http://'.$_SERVER['HTTP_HOST'].str_replace('\\', '/', $_SERVER['REQUEST_URI']);
        $data['signature']    = $this->makeJsSign($data);
        $data['appid']        = $this->appid;

        return $data;
    }

    /**
     * 生成签名,支付或红包等使用
     *
     * @param        $data
     *
     * @return string
     */
    public function makeJsSign($data)
    {
        //签名步骤一：按字典序排序参数
        ksort($data);
        $string = $this->ToUrlParams($data);

        return sha1($string);
    }

    /**
     * 获取ticket
     *
     * @param bool $force 强制设置
     *
     * @return mixed
     * @throws \Exception
     */
    public function getTicket($force = false)
    {
        static $ticket;
        if ( ! $ticket) {
            $data = Cache::get('_wechat_ticket_');
            if ($force === true || ! $data) {
                $token = $this->getAccessToken();
                $url   = "https://api.weixin.qq.com/cgi-bin/ticket/getticket?access_token={$token}&type=jsapi";
                $data  = json_decode(Curl::get($url), true);
                //获取失败
                if (isset($data['errcode']) && $data['errcode'] != 0) {
                    throw new \Exception($data['errmsg']);
                }
                //缓存access_token
                Cache::set('_wechat_ticket_', $data, 7000);
            }
            $ticket = $data['ticket'];
        }

        return $this->ticket = $ticket;
    }
}
