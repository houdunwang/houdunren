<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\Resource;

class LessonResource extends Resource
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
    return $lesson;
  }
  protected function videos()
  {
    return $this->video()->select('id', 'title')->get();
  }
}
