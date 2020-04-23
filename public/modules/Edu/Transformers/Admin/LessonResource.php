<?php

namespace Modules\Edu\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

use Illuminate\Support\Facades\Route;

/**
 * 课程资源
 * Class LessonResource
 */
class LessonResource extends JsonResource
{
    public function toArray($request)
    {
        $lesson = parent::toArray($request);
        $lesson['videos'] = $this->video;
        $lesson['video_count'] = $this->video->count();
        $lesson['tags'] = $this->tag;
        return $lesson;
    }
}
