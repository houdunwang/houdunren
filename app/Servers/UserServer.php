<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Notifications\UserNotification;
use App\User;
use Illuminate\Support\Collection;

/**
 * 会员服务
 * Class UserServer
 * @package App\Servers
 */
class UserServer
{
    /**
     * 用户登录
     * name字段做为登录字段可以邮箱或手机号
     * @param array $user
     * @return bool
     */
    /**
     * 用户登录
     * name字段做为登录字段可以邮箱或手机号
     * @param array $user
     * @return bool
     */
    public function login(array $user): bool
    {
        if (filter_var($user['username'], FILTER_VALIDATE_EMAIL)) {
            return auth()->attempt(['email' => $user['username'], 'password' => $user['password']]);
        }
        if (preg_match('/^1\d{10}$/', $user['username'])) {
            return auth()->attempt(['mobile' => $user['username'], 'password' => $user['password']]);
        }
        return false;
    }

    /**
     * 发送用户通知
     * @param User $user 用户
     * @param string $message 消息内容
     * @param string $url 查看消息网址
     * @return bool
     */
    public function notify(User $user, string $message, string $url = ''): bool
    {
        if ($user['id'] != auth()->id()) {
            $user->notify(new UserNotification(['message' => $message, 'url' => $url]));
        }
        return true;
    }

    /**
     * 向多个用户发送通知消息
     * @param Collection $users 用户集合
     * @param string $message 消息内容
     * @param string $url 查看消息网址
     */
    public function notifyToMany(Collection $users, string $message, string $url)
    {
        foreach ($users as $user) {
            $this->notify($user, $message, $url);
        }
    }

    /**
     * 替换字符串中的"@用户昵称"为用户空间链接
     * @param string $content 替换内容
     * @return string
     */
    public function replaceName(string $content): string
    {
        return preg_replace_callback('/@(.+)\s+/isU', function ($subject) {
            $user = User::where('name', trim($subject[1]))->first();
            if ($user) {
                return "<a href='" . route('user.home', $user) . "'>@" . $user['name'] . "</a>&nbsp;";
            }
            return $subject[0];
        }, $content);
    }

    /**
     * 获取字符串中的所有"@用户昵称"用户对象
     * @param string $content
     * @return array
     */
    public function getUsersFromContent(string $content): array
    {
        preg_match_all('/@(.+)\s+/isU', $content, $matches, PREG_SET_ORDER);
        $users = [];
        foreach ($matches as $subject) {
            $user = User::name(trim($subject[1]))->first();
            if ($user) {
                array_pull($users, $user['id']);
            }
        }
        return array_unique($users);
    }
}