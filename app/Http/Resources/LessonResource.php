<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'videos' => VideoResource::collection($this->whenLoaded('videos')),
            'system' => new SystemResource($this->whenLoaded('system')),
            // 'download_address' => $this->when(isSubscribe(), function () {
            //     return $this->download_address;
            // })
        ] + parent::toArray($request);
    }
}
