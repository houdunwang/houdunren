<?php

namespace Modules\Article\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Article\Entities\Menu;
use App\Models\User;

/**
 * 菜单策略
 * @package Modules\Article\Policies
 */
class MenuPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Menu $menu)
    {
        return true;
    }

    public function update(User $user, Menu $menu)
    {
        return true;
    }

    public function delete(User $user, Menu $menu)
    {
        return true;
    }
}
