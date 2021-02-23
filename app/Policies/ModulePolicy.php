<?php

namespace App\Policies;

use App\Models\Module;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use UserService;

/**
 * 模块策略
 * @package App\Policies
 */
class ModulePolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function view(User $user, Module $module)
    {
        return UserService::isSuperAdmin($user);
    }

    public function create(User $user)
    {
        return UserService::isSuperAdmin($user);
    }

    public function update(User $user, Module $module)
    {
        return UserService::isSuperAdmin($user);
    }

    public function delete(User $user, Module $module)
    {
        return UserService::isSuperAdmin($user);
    }

    /**
     * 扩展模块里管理模块配置
     * @param User $user
     * @param Module $module
     * @return bool
     */
    public function config(User $user, Module $module)
    {
        return access();
    }

    /**
     * 安装模块
     * @param User $user
     * @return mixed
     */
    public function install(User $user)
    {
        return $user->isSuperAdmin;
    }

    /**
     * 卸载模块
     * @param User $user
     * @return mixed
     */
    public function unInstall(User $user)
    {
        return $user->isSuperAdmin;
    }
}
