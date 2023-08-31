<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\AliyunService;

class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'videos' => VideoResource::collection($this->whenLoaded('videos')),
            'system' => new SystemResource($this->whenLoaded('system')),
            'path_cdn' =>  app(AliyunService::class)->videoCdnUrl($this->video),
            'download_address' => $this->when(isSubscribe() || isAdministrator(), function () {
                return $this->download_address;
            })
        ] + parent::toArray($request);
    }
}
