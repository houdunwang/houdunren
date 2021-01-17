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
        return parent::toArray($request) +
            ['tags' => $this->tags->pluck('id'), 'videos' => $this->videos->sortBy('rank')];
    }
}
