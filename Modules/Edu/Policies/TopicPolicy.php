<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\Topic;
use SiteService;
use UserService;

class TopicPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Topic $topic)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Topic $topic)
    {
        return $user['id'] == $topic['user_id'];
    }

    public function delete(User $user, Topic $topic)
    {
        return $user['id'] == $topic['user_id'];
    }

    /**
     * 推荐
     * @param User $user
     * @param Topic $topic
     * @return bool
     */
    public function recommend(User $user, Topic $topic)
    {
        return UserService::isMaster(site(), $user);
    }
}
