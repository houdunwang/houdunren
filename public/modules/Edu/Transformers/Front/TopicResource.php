<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\Resource;

class TopicResource extends Resource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request
   * @return array
   */
  public function toArray($request)
  {
    $topic =  parent::toArray($request);
    $topic['user'] = $this->user;
    return $topic;
  }
}
