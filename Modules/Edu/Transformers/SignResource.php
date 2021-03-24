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
            'user' => new UserResource($this->whenLoaded('user')),
            'total_days' => Sign::where('site_id', site('id'))->where('user_id', $this->user->id)->count(),
            'month_days' => Sign::where('site_id', site('id'))->where('user_id', $this->user->id)->whereYear('created_at', now())->whereMonth('created_at', now())->count()
        ] + parent::toArray($request);
    }
}
