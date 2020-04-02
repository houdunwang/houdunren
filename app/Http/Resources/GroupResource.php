<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;


class GroupResource extends JsonResource
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
      'id' => $this->id,
      'name' => $this->name,
      'site_num' => $this->site_num,
      'default' => $this->default,
      'packages' => PackageResource::collection($this->package()->with('module')->get())
    ];
  }
}
