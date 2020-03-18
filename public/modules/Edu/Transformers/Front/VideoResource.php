<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\Resource;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;

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
    $resource['is_favour'] = $this->isFavour();
    return $resource;
  }

  public function isFavour()
  {
    return (bool) User::instance(Auth::user())->videos->where('id', $this['id'])->first();
  }
}
