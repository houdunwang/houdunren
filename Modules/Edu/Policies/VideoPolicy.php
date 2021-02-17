<?php

namespace Modules\Edu\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\User;
use Modules\Edu\Entities\Video;

class VideoPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        return true;
    }

    public function view(User $user, Video $Video)
    {
        return true;
    }

    public function create(User $user)
    {
        return true;
    }

    public function update(User $user, Video $Video)
    {
    }

    public function delete(User $user, Video $Video)
    {
    }
}
