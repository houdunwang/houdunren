<?php

namespace App\Services;

use App\Models\Soft;
use App\Models\SoftSecret;

//软件TOKEN
class SoftTokenService
{
    /**
     * 获取软件TOKEN
     *
     * @param string $secret 密钥
     * @param string $app 软件名称
     */
    public function getSoftToken(string $secret, string $app)
    {
        $soft = Soft::whereName($app)->firstOrFail();
        $softSecret = SoftSecret::whereSecret($secret)->firstOrFail();
        $user = $softSecret->user;

        //每次登录重置TOKEN，软件同时只能一个人使用
        $user->softTokens()->where('soft_id', $soft->id)->delete();

        //生成软件授权令牌
        $user->softTokens()->create([
            'token' => $token = md5($user->id . now() . mt_rand(1, 9999)),
            'soft_id' => $soft->id
        ]);
        return $user->softTokens()->whereSoftId($soft->id)->first();
    }

    public function checkToken(string $token, string $app)
    {
        // $soft = Soft::whereName($app)->first();
        // if (!$soft) return $this->respondNotFound('软件已下架');
        // $softToken = SoftToken::whereSoftId($soft->id)->whereToken(request('token'))->first();
        // if (!$softToken) return $this->respondForbidden("令牌无效或软件被其他用户使用");

        if (!$softToken->user->isSubscribe) return $this->respondForbidden('订阅已经失效');
    }
}
