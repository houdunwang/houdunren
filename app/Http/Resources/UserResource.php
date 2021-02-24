<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 用户资源
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'wechat' => $this->when($this->permissions['update'], $this->wechat),
            'mobile' => $this->when($this->permissions['update'], $this->mobile),
            'email' => $this->when($this->permissions['update'], $this->email),
            'roles' => $this->whenLoaded('roles'),
            'group' => new GroupResource($this->whenLoaded('group')),
        ];
    }
}
