<?php

namespace Modules\Edu\Policies;

use App\Services\SiteService;
use App\Services\UserService;
use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\Topic;
use App\User;

class TopicPolicy
{
    use HandlesAuthorization;

    public function before(User $user, $ability)
    {
        $isAdmin = app(UserService::class)->isAdmin(site(), $user);
        if ($user->is_super_admin || $isAdmin) {
            return true;
        }
    }

    public function delete(User $user, Topic $topic)
    {
        return $topic->user->id === $user->id;
    }
}
