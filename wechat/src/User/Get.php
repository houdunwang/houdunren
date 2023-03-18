<?php

namespace Houdunwang\Wechat\User;

use Exception;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

/**
 * 获取粉丝
 */
trait Get
{
    /**
     * 获取用户资料
     * @param mixed $openid
     * @return mixed
     * @throws RequestException
     */
    public function getByOpenid($openid)
    {
        $response = Http::get($this->api . '/user/info?access_token=' . $this->token() . '&openid=' . $openid . '&lang=zh_CN')
            ->throw()
            ->json();
        return $this->return($response);
    }

    /**
     * 获取粉丝列表
     * @param null|int $nextOpenid
     * @return mixed
     * @throws RequestException
     */
    public function getList(?string $nextOpenid = null)
    {
        $url = $this->api . '/user/get?access_token=' . $this->token();
        if ($nextOpenid) {
            $url .= '&next_openid=' . $nextOpenid;
        }
        $response = Http::get($url)->throw()->json();
        return $this->return($response);
    }

    /**
     * 根据OPENID批量获取粉丝数据
     * @param array $openids
     * @return mixed
     */
    public function getByOpenids(array $openids)
    {
        $url = $this->api . '/user/info/batchget?access_token=' . $this->token();

        $response =  Http::post($url, ['user_list' => array_map(function ($openid) {
            return ['openid' => $openid, 'lang' => 'zh_CN'];
        }, $openids)])->throw()->json();

        return $this->return($response);
    }
}
