<?php

namespace App\Http\Resources;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\AliyunService;

class MorningResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'video_cdn' => $this->when(isset($this->video), function () {
                return $this->video = app(AliyunService::class)->videoCdnUrl($this->video);
            }),
            'user' => empty($this->user) ? null : new UserResource($this->whenLoaded('user'))
        ] + parent::toArray($request);
    }
}
