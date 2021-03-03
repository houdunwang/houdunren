<?php

namespace Modules\Article\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Article\Entities\Tag;
use App\Models\User;

/**
 * 标签策略
 * @package Modules\Article\Policies
 */
class TagPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Tag $tag)
    {
        return true;
    }

    public function update(User $user, Tag $tag)
    {
        return true;
    }

    public function delete(User $user, Tag $tag)
    {
        return true;
    }
}
