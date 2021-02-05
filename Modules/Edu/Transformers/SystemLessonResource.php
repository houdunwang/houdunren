<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemLessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'lessons' => $this->lessons
        ];
    }
}
