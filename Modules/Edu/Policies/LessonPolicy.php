<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;

use App\Models\User;
use Modules\Edu\Entities\Lesson;
use UserService;

/**
 * 课程权限策略
 * @package Modules\Edu\Policies
 */
class LessonPolicy
{
    use HandlesAuthorization;

    public function viewAny(?User $user)
    {
        return true;
    }

    public function view(?User $user)
    {
        return true;
    }

    public function create(User $user)
    {
        return UserService::isMaster(site(), $user);
    }

    public function update(User $user, Lesson $lesson)
    {
        return UserService::isMaster(site(), $user) || $user['id'] == $lesson['user_id'];
    }

    public function delete(User $user, Lesson $lesson)
    {
        return UserService::isMaster(site(), $user) || $user->id == $lesson->user_id;
    }
}
