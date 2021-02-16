<?php

namespace Modules\Edu\Transformers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 用户视频观看资源
 * @package Modules\Edu\Transformers
 */
class UserVideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'user' => new UserResource($this->whenLoaded('user'))
        ];
    }
}
