<?php

namespace App\Services;

use App\Models\SoftSecret;
use App\Models\User;
use Auth;
use Houdunwang\Wechat\User as WechatUser;
use Http;
use Log;

//软件服务
class SoftService
{
    //刷新密钥
    public function refreshSecret(User $user, $force = false)
    {
        if (!$user->isSubscribe) {
            $user->softSecret()->delete();
            return false;
        }
        if (!$user->softSecret) {
            $user->softSecret()->create([
                "secret" => md5($user->id . now()),
                "end_time" => now()->addYear()
            ]);
        }

        if ($force) {
            $user->softSecret()->update([
                "secret" => md5($user->id . now())
            ]);
        }
        return $user->softSecret;
    }
}
