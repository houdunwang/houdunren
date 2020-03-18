<?php

namespace Modules\Edu\Transformers\Admin;

use Illuminate\Http\Resources\Json\Resource;

/**
 * 系统课程资源
 * Class SystemResource
 */
class SystemResource extends Resource
{
  /**
   * Transform the resource into an array.
   *
   * @param  \Illuminate\Http\Request
   * @return array
   */
  public function toArray($request)
  {
    $data =  parent::toArray($request);
    $data['lessons'] = $this->lesson;
    return $data;
  }
}
