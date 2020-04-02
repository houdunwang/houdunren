<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;

/**
 * 视频资源
 * @package Modules\Edu\Transformers\Front
 */
class VideoResource extends Resource
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
    // $request['favour_count']=
    $resource['is_favour'] = $this->when(Auth::user(), $this->isFavour(Auth::user()));
    $resource['is_favorite'] = $this->when(Auth::user(), $this->isFavorite(Auth::user()));
    return $resource;
  }
}
