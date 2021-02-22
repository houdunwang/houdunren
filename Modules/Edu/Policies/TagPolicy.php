<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\Tag;

/**
 * 内容标签
 * @package Modules\Edu\Policies
 */
class TagPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
    }
    public function viewAny(User $user)
    {
        return access();
    }

    public function batchUpdate(User $user)
    {
        return access();
    }
}
