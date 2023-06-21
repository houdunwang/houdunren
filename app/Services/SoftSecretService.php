<?php

namespace App\Services;

use App\Models\SoftSecret;
use App\Models\User;

//软件服务
class SoftSecretService
{
    //创建或更新软件密钥
    public function createOrUpdateSoftSecret(User $user)
    {
        if (!$user->isSubscribe) abort(403, "你不是订阅用户或订阅已经到期");

        $user->softSecret()->delete();
        $user->softSecret()->updateOrCreate(
            ["user_id" => $user->id],
            [
                "secret" => md5($user->id . now()) . mt_rand(1, 9999),
                "end_time" => $user->subscribe->updated_at->addYear(1)
            ]
        );
        return $user->refresh()->softSecret;
    }

    //验证密钥到期时间
    public function checkSoftSecret(string $secret)
    {
        $softSecret = SoftSecret::whereSecret($secret)->with('user')->first();
        return $softSecret &&  $softSecret->user->isSubscribe && $softSecret->end_time >= now();
    }
}
