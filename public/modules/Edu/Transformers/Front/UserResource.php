<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;

class UserResource extends JsonResource
{
    public function toArray($request)
    {
        $user =  parent::toArray($request);
        unset($user['mobile']);
        $user['is_follower'] = $this->isFollower();
        $user['is_favour'] = $this->isFavour();
        return $user;
    }
    protected function isFollower()
    {
        if (Auth::check()) {
            return $this->resource->isFans(Auth::user());
        }
        return false;
    }

    protected function isFavour()
    {
        if (Auth::check()) {
            return $this->resource->isFavour(Auth::user());
        }
        return false;
    }
}
