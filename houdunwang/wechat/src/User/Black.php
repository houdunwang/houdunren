<?php

namespace Houdunwang\WeChat\User;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Log;

/**
 * 黑名单
 */
trait Black
{
    /**
     * 批量拉黑用户
     * @param array $openidList
     * @return mixed
     * @throws RequestException
     */
    public function batchblack(array $openidList)
    {
        $response = Http::post($this->api . '/tags/members/batchblacklist?access_token=' . $this->token(), ["openid_list" => $openidList])->throw()->json();
        return $this->return($response);
    }

    /**
     * 移除黑名单
     * @param null|string $nextOpenid
     * @return mixed
     * @throws RequestException
     */
    public function removeBlackList(array $openidList)
    {
        $url = $this->api . '/tags/members/batchunblacklist?access_token=' . $this->token();
        $response = Http::post($url, ["openid_list" => $openidList])->throw()->json();
        return $this->return($response);
    }

    /**
     * 获取黑名单列表
     * @param null|string $nextOpenid
     * @return mixed
     * @throws RequestException
     */
    public function getBlackList(?string $nextOpenid = null)
    {
        $url = $this->api . '/tags/members/getblacklist?access_token=' . $this->token();
        $response = Http::post($url, ["begin_openid" => $nextOpenid])->throw()->json();
        return $this->return($response);
    }
}
