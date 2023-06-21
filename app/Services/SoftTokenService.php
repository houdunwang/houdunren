<?php

namespace App\Services;

use App\Models\Soft;
use App\Models\SoftSecret;
use App\Models\SoftToken;

//软件TOKEN
class SoftTokenService
{
    /**
     * 获取软件TOKEN
     *
     * @param string $secret 密钥
     * @param string $app 软件名称
     */
    public function createSoftToken(string $secret, string $app)
    {
        $soft = Soft::whereName($app)->firstOrFail();
        $softSecret = SoftSecret::whereSecret($secret)->with('user')->firstOrFail();
        $user = $softSecret->user;

        //每次登录重置TOKEN，软件同时只能一个人使用
        $user->softTokens()->where('soft_id', $soft->id)->delete();

        //生成软件授权令牌
        $user->softTokens()->create([
            'token' => md5($user->id . now() . mt_rand(1, 9999)),
            'soft_id' => $soft->id
        ]);

        return $user->softTokens()->whereSoftId($soft->id)->first();
    }

    /**
     * 验证命令
     *
     * @param string $token 软件令牌
     */
    public function checkToken(string $token)
    {
        $softToken = SoftToken::whereToken($token)->with('user')->first();
        return $softToken && app(SoftSecretService::class)->checkSoftSecret($softToken->user->softSecret->secret);
    }
}
