<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use UserService;
use Auth;

/**
 * 用户资源
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'isSuperAdmin' => $this->isSuperAdmin,
            'name' => $this->name ?: '盾友',
            'avatar' => $this->icon,
            'permissions' => $this->permissions,
            'qq' => $this->qq,
            'github' => $this->github,
            'wakatime' => $this->wakatime,
            'weibo' => $this->weibo,
            'wechat' => $this->when($this->permissions['update'], $this->wechat),
            'home' => $this->home,
            'group_id' => $this->group_id,
            'mobile' => $this->when($this->permissions['update'], $this->mobile),
            'email' => $this->when($this->permissions['update'], $this->email),
            'group' => new GroupResource($this->whenLoaded('group')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'roles' => $this->whenLoaded('roles')
        ];
    }
}
