<?php

namespace App\Http\Resources;

use App\Models\Module;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 套餐
 * Class PackageResource
 * @package App\Http\Resources
 */
class PackageResource extends JsonResource
{
  /**
   * Transform the resource into an array.
   *
   * @param \Illuminate\Http\Request $request
   * @return array
   */
  public function toArray($request)
  {
    return [
      'id' => $this['id'],
      'name' => $this['name'],
      'system' => $this['system'],
      'modules' => $this->module,
      'group' => $this->group
    ];
  }
}
