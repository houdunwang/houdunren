<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\User as ModuleUser;
use Modules\Edu\Entities\video;

/**
 * 视频策略
 * @package Modules\Edu\Policies
 */
class videoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, video $video)
    {
        $lesson = $video->lesson;
        if ($lesson->price <= 0) {
            return true;
        }
        $user = ModuleUser::make($user);
        if ($user->duration->end_time > now()) {
            return true;
        }
        return false;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, video $video)
    {
    }

    public function delete(User $user, video $video)
    {
    }
}
