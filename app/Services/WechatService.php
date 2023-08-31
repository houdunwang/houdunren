<?php

namespace App\Services;

use App\Models\User;
use Auth;
use Houdunwang\Wechat\User as WechatUser;
use Http;
use Log;

//微信服务
class WechatService
{
    //根据 OPENID 创建用户
    public function registerByOpenid(string $openId)
    {
        $userWechat = app(WechatUser::class)->config(config('hd.wechat'));
        $info = $userWechat->getByOpenid($openId);
        $user = User::Where('unionid', $info['unionid'])->first();
        if (!$user) $user = new User();
        $user->openid = $info['openid'];
        $user->unionid = $info['unionid'];
        $user->nickname = $user->nickname ?: $info['nickname'];
        $user->save();
        Auth::guard('web')->login($user);
        return $user;
    }

    //获取微信头像
    protected function getHeadImageUrl($url)
    {
        if (empty($url)) return '';
        $content = Http::send("GET", $url);
        $file = mt_rand() . time() . '.jpg';
        return app(OssService::class)->string($file, $content)['url'];
    }
}
