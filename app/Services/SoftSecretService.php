<?php

namespace App\Services;

use App\Models\Order;
use App\Models\SoftSecret;
use App\Models\User;

//软件服务
class SoftSecretService
{
    /**
     * 创建软件密钥
     *
     * @param Order $order
     */
    public function addSoftSecret(Order $order)
    {
        $order->user->softSecret()->updateOrCreate(
            ["user_id" => $order->user->id],
            [
                "secret" => md5($order->user->id . now()) . mt_rand(1, 9999),
                "end_time" => $order->created_at->addYear(1)
            ]
        );
        return $order->user->refresh()->softSecret;
    }

    /**
     * 刷新软件密钥
     */
    public function refreshSoftSecret()
    {
        if (!user()->softSecret) {
            $order = user()->orders()->where('pay_state', true)->orderBy('id', 'desc')->first();
            return $this->addSoftSecret($order);
        }
        user()->softSecret()->update([
            "secret" => md5(user()->id . now()) . mt_rand(1, 9999),
        ]);
        return user()->refresh()->softSecret;
    }

    /**
     * 验证软件密钥
     *
     * @param string $secret
     */
    public function checkSoftSecret(string $secret)
    {
        $softSecret = SoftSecret::whereSecret($secret)->with('user')->first();
        return $softSecret && $softSecret->user->isSubscribe && $softSecret->end_time >= now();
    }
}
