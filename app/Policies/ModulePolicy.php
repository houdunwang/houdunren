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
        return true;
    }

    public function view(User $user, Module $module)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Module $module)
    {
        return true;
    }

    public function delete(User $user, Module $module)
    {
        return true;
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
