<?php

namespace Modules\Edu\Transformers\Center;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 获取用户资源
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'home' => $this->home,
            'avatar' => $this->avatar,
            'email' => $this->email,
            'qq' => $this->qq,
            'github' => $this->github,
            'weibo' => $this->weibo,
            'wechat' => $this->wechat,
            'wakatime' => $this->wakatime,
        ];
    }
}
