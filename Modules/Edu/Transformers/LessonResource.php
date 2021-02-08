<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 课程资源
 * @package Modules\Edu\Transformers
 */
class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'site_id' => $this->site_id,
            'thumb' => $this->thumb,
            'read_count' => $this->read_count,
            'video_num' => $this->video_num,
            'favour_count' => $this->favour_count,
            'favorite_count' => $this->favorite_count,
            'comment_count' => $this->comment_count,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'path' => $this->when(false, $this->path),
            'videos' => VideoResource::collection($this->whenLoaded('videos')),
        ];
    }
}
