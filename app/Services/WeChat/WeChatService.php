<?php

namespace App\Services\WeChat;

use App\Models\User;
use App\Models\WeChatUser;

/**
 * 微信管理服务
 * @package App\Services
 */
class WeChatService
{
    /**
     * 微信检测
     * @return boolean
     */
    public function isWeChat(): bool
    {
        return isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false;
    }

    /**
     * 保存微信用户到数据表
     * @param array $account
     * @return User
     */
    public function saveUser(array $account): User
    {
        //微信粉丝是否已经记录到表
        if ($account['unionid']) {
            $wechatUser = WeChatUser::where('unionid', $account['unionid'] ?? '')->first();
        } else {
            $wechatUser = WeChatUser::where('openid', $account['openid'] ?? '')->first();
        }
        //添加系统用户
        if (!$wechatUser) {
            //用户表
            $user = User::create([
                'avatar' => $account['headimgurl'] ?? null,
                'name' => $account['nickname'] ?? null,
            ] + $account);
            //微信粉丝表
            $wechatUser = WeChatUser::create($account + ['user_id' => $user['id'], 'site_id' => SID]);
        }
        return $wechatUser->user;
    }
}
