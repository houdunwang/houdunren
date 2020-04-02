<?php

namespace Modules\Edu\Transformers\Front;

use App\User;
use Illuminate\Http\Resources\Json\Resource;

class CommentResource extends Resource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request
   * @return array
   */
  public function toArray($request)
  {
    $comment =  parent::toArray($request);
    return $comment;
  }
}
