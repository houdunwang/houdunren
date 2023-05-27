<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user' => $this->whenLoaded('user', new UserResource($this->user))
        ] + parent::toArray($request);
    }
}
