<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 模块资源
 * @package App\Http\Resources
 */
class ModuleResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'groups' => $this->groups,
        ];
    }
}
