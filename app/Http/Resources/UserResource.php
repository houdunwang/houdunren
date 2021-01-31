<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use UserService;
use Auth;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->nickname,
            'avatar' => $this->icon,
            'email' => $this->email,
            'qq' => $this->qq,
            'github' => $this->github,
            'wakatime' => $this->wakatime,
            'weibo' => $this->weibo,
            'group_id' => $this->group_id,
            'mobile' => $this->when($this->check(), $this->mobile),
            'created_at' => $this->created_at,
            'group' => new GroupResource($this->group)
        ];
    }

    public function check()
    {
        if (Auth::check()) {
            return UserService::isSuperAdmin(Auth::user()) || Auth::id() == $this->resource->id;
        }
    }
}
