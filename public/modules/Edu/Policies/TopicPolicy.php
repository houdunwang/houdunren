<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Edu\Entities\Topic;
use App\User;

class TopicPolicy
{
    use HandlesAuthorization;

    public function __construct()
    {
    }

    public function delete(User $user, Topic $topic)
    {
        return $topic->user->id === $user->id;
    }
}
