<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

/**
 * 视频资源
 * @package Modules\Edu\Transformers\Front
 */
class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $resource =  parent::toArray($request);
        $resource['is_favour'] = Auth::check() ? $this->isFavour(Auth::user()) : false;
        $resource['is_favorite'] = Auth::check() ? $this->isFavorite(Auth::user()) : false;
        $resource['lesson'] = $this->lesson()->with(['video' => function ($query) {
            $query->select('id', 'title', 'lesson_id')->orderBy('rank', 'asc');
        }])->first();
        return $resource;
    }
}
