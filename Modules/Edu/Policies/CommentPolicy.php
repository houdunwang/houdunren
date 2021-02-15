<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use UserService;
use Modules\Edu\Entities\Comment;

/**
 * 评论守卫
 * @package Modules\Edu\Policies
 */
class CommentPolicy
{
    use HandlesAuthorization;

    public function delete(User $user, Comment $comment)
    {
        return UserService::isMaster(site(), $user) || $user->id == $comment->user_id;
    }

    public function create(User $user)
    {
        return true;
    }
}
