<?php

namespace Modules\Article\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Article\Entities\Category;
use App\Models\User;

/**
 * 栏目策略
 * @package Modules\Article\Policies
 */
class CategoryPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Category $category)
    {
        return true;
    }

    public function update(User $user, Category $category)
    {
        return true;
    }

    public function delete(User $user, Category $category)
    {
        return true;
    }
}
