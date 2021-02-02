<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AdminResource extends JsonResource
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
            'created_at' => $this->created_at,
            'group' => new GroupResource($this->group),
            'roles' => $this->roles
        ];
    }
}
