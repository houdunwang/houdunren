<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 角色资源
 */
class RoleResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'permissions' => $this->permissions
        ];
    }
}
