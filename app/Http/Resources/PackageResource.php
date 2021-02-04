<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 套餐资源
 * @package App\Http\Resources
 */
class PackageResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'modules' => ModuleResource::collection($this->whenLoaded('modules')),
            'groups' => GroupResource::collection($this->whenLoaded('groups')),
        ];
    }
}
