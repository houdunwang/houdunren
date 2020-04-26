<?php

namespace Modules\Edu\Http\Controllers\Center;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Center\UserResource;

class UserController extends ApiController
{
    public function show(User $user)
    {
        return $this->json(new UserResource($user));
    }
}
