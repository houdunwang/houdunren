<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class LessonResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $lesson = parent::toArray($request);
        $lesson['videos'] = $this->videos();
        $lesson['video_count'] = $this->video->count();
        $lesson['tags'] = $this->tag;
        $lesson['is_favour'] = Auth::check() ? $this->isFavour(Auth::user()) : false;
        $lesson['is_favorite'] = Auth::check() ? $this->isFavorite(Auth::user()) : false;
        return $lesson;
    }
    protected function videos()
    {
        return $this->video()->select('id', 'title')->get();
    }
}
