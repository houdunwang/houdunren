<?php

namespace App\Services;

use App\Models\SoftSecret;
use App\Models\User;
use Auth;
use Houdunwang\Wechat\User as WechatUser;
use Http;
use Log;

//软件服务
class SoftSecretService
{
    //获取密钥
    public function getSoftSecret(User $user)
    {
        $user->softSecret()->firstOrCreate(
            ["user_id" => $user->id],
            [
                "secret" => $this->secretString($user),
                "end_time" => now()->addYear()
            ]
        );
        return $user->refresh()->softSecret;
    }

    //刷新密钥
    public function refreshSecret(User $user)
    {
        $this->getSoftSecret($user);
        $user->softSecret()->update([
            "secret" => $this->secretString($user),
        ]);
        return $user->refresh()->softSecret;
    }

    protected function secretString(User $user)
    {
        return md5($user->id . now()) . mt_rand(1, 9999);
    }
}
