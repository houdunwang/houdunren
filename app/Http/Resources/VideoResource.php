<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use App\Services\AliyunService;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $data = parent::toArray($request);
        return  [
            "user" => $this->whenLoaded("user", new UserResource($this->user)),
            'lesson' => new LessonResource($this->whenLoaded('lesson')),
        ] + $data;
    }
}
