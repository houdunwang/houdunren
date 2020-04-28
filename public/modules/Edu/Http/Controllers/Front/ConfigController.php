<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
// use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Auth;

class ConfigController extends ApiController
{
    public function site()
    {
        // return $this->json(new UserResource(Auth::user()));
    }
}
