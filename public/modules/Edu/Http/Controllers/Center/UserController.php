<?php

namespace Modules\Edu\Http\Controllers\Center;

use App\Http\Controllers\ApiController;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Center\UserResource;

class UserController extends ApiController
{
    public function show(User $user)
    {
        return $this->json(new UserResource($user));
    }

    public function follower(User $user)
    {
        $followers = $user->followers()->paginate();
        return UserResource::collection($followers);
    }
    public function fans(User $user)
    {
        $fans = $user->fans()->paginate();
        return UserResource::collection($fans);
    }
}
