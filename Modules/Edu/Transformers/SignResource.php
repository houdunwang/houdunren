<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Edu\Entities\Sign;
use App\Http\Resources\UserResource;

/**
 * 签到资源
 * @package Modules\Edu\Transformers
 */
class SignResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id, 'mood' => $this->mood,
            'content' => $this->content,
            'total_days' => Sign::where('site_id', SID)->where('user_id', $this->user->id)->count(),
            'month_days' => Sign::where('site_id', SID)->where('user_id', $this->user->id)->whereYear('created_at', now())->whereMonth('created_at', now())->count(),
            'user' => new UserResource($this->whenLoaded('user')),
            'created_at' => $this->created_at,
            'permissions' => $this->permissions
        ];
    }
}
