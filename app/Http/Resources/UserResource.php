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
            'name' => $this->nickname,
            'avatar' => $this->icon,
            'qq' => $this->qq,
            'github' => $this->github,
            'wakatime' => $this->wakatime,
            'weibo' => $this->weibo,
            'wechat' => $this->wechat,
            'home' => $this->home,
            'group_id' => $this->group_id,
            'mobile' => $this->when($this->check(), $this->mobile),
            'email' => $this->email,
            'created_at' => $this->created_at,
            'group' => new GroupResource($this->group),
        ];
    }

    public function check()
    {
        if (Auth::check()) {
            return UserService::isSuperAdmin(Auth::user()) || Auth::id() == $this->resource->id;
        }
    }
}
