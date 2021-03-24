<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class SystemLessonResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'site_id' => $this->site_id,
            'user_id' => $this->user_id,
            'title' => $this->title,
            'preview' => $this->preview,
            'description' => $this->description,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'lessons' => LessonResource::collection($this->whenLoaded('lessons'))
        ];
    }
}
