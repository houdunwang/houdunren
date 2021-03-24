<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

/**
 * 贴子
 * @package Modules\Edu\Transformers
 */
class TopicResource extends JsonResource
{
    public function toArray($request)
    {
        return  [
            'user' => new UserResource($this->whenLoaded('user')),
            'content' => markdown($this->content)
        ] + parent::toArray($request);
    }
}
