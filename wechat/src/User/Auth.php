<?php

namespace Houdunwang\Wechat\User;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use URL;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;

/**
 * 获取用户资料
 */
trait Auth
{
    /**
     * 获取基本资料
     * @return mixed
     * @throws RequestException
     */
    public function snsapiBase()
    {
        return $this->request('snsapi_userinfo');
    }

    /**
     * 获取详细资料
     * @return mixed
     * @throws RequestException
     */
    public function snsapiUserInfo()
    {
        $response = $this->request('snsapi_userinfo');

        if (isset($response['openid'])) {
            $api = 'https://api.weixin.qq.com/sns/userinfo?access_token=' . $response['access_token'] . '&openid=' . $response['openid'] . '&lang=zh_CN';
            return Http::get($api)->throw()->json();
        }
    }

    /**
     * 发送请求
     * @param string $type
     * @return mixed
     * @throws RequestException
     */
    protected function request(string $type)
    {
        $status = isset($_GET['code']) && isset($_GET['state']) && $_GET['state'] == 'STATE';
        if ($status) {
            $api = 'https://api.weixin.qq.com/sns/oauth2/access_token?appid=' . $this->config('appid') . '&secret=' . $this->config('appsecret') . '&code=' . $_GET['code'] . '&grant_type=authorization_code';
            return Http::get($api)->throw()->json();
        } else {
            $url = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=' . $this->config('appid') . '&redirect_uri=' . URL::full() . '&response_type=code&scope=' . $type . '&state=STATE#wechat_redirect';
            header('location:' . $url);
            die();
        }
    }
}
