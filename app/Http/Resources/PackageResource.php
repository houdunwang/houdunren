<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 套餐资源
 */
class PackageResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'modules' => ModuleResource::collection($this->modules)
        ];
    }
}
