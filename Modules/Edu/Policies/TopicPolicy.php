<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\Topic;

class TopicPolicy
{
    use HandlesAuthorization;

    public function before($user, $ability)
    {
        if ($user->isSuperAdmin || is_master()) {
            return true;
        }
    }
    public function recommend(User $user, Topic $topic)
    {
        return false;
    }

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
}
