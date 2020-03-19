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
    $resource['is_favour'] = $this->when(Auth::user(), $this->isFavour());
    $resource['is_favorite'] = $this->when(Auth::user(), $this->isFavorite());
    return $resource;
  }
  /**
   * 是否点赞
   * @return bool
   */
  public function isFavour()
  {
    $user = User::instance(Auth::user());
    return (bool) $user->videoFavour->where('id', $this['id'])->first();
  }

  /**
   * 是否收藏
   * @return void
   */
  public function isFavorite()
  {
    $user =  User::instance(Auth::user());
    return (bool) $user->videFavorite->where('id', $this['id'])->first();
  }
}
