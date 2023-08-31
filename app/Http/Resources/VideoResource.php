<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        return  [
            "user" => $this->whenLoaded("user", new UserResource($this->user)),
            'lesson' => new LessonResource($this->whenLoaded('lesson')),
        ] + $data;
    }
}
