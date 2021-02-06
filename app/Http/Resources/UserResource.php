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
            'is_super_admin' => $this->isSuperAdmin,
            'name' => $this->name ?: '盾友',
            'avatar' => $this->icon,
            'permissions' => $this->permissions,
            'qq' => $this->qq,
            'github' => $this->github,
            'wakatime' => $this->wakatime,
            'weibo' => $this->weibo,
            'wechat' => $this->wechat,
            'home' => $this->home,
            'group_id' => $this->group_id,
            'mobile' => $this->when($this->eq(), $this->mobile),
            'email' => $this->email,
            'group' => new GroupResource($this->whenLoaded('group')),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'roles' => $this->whenLoaded('roles')
        ];
    }

    public function eq()
    {
        if (Auth::check()) {
            return Auth::id() == $this->resource->id;
        }
    }
}
