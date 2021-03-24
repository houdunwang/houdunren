<?php

namespace App\Services\User;

use App\Models\Site;
use App\Models\User;

/**
 * 用户服务
 * @package App\Services\User
 */
class UserService
{
    /**
     * 登录字段
     *
     * @return string
     */
    public function account(): string
    {
        return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    /**
     * 超级管理员检测
     *
     * @param User $user
     * @return boolean
     */
    public function isSuperAdmin(User $user): bool
    {
        static $cache = [];
        if (isset($cache[$user['id']])) {
            return $cache[$user['id']];
        }
        return $cache[$user['id']] = $user && $user->isSuperAdmin;
    }

    /**
     * 站点管理员检测
     *
     * @param Site $site
     * @param User $user
     * @return boolean
     */
    public function isMaster(Site $site, User $user): bool
    {
        static $cache = [];
        $name = $site['id'] . $user['id'];
        if (isset($cache[$name])) {
            return $cache[$name];
        }
        return $cache[$name] = $this->isSuperAdmin($user) || $user['id'] == $site['user_id'];
    }

    /**
     * 是否为站点管理员
     * 如果管理员没有配置权限将无法管理站点
     *
     * @param User $user
     * @param Site $site
     * @return boolean
     */
    public function isAdmin(Site $site, User $user): bool
    {
        static $cache = [];
        $name = $site['id'] . $user['id'];
        if (isset($cache[$name])) {
            return $cache[$name];
        }
        return $cache[$name] = $this->isMaster($site, $user) || $site->isAdmin($user);
    }
}
