<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 微信二维码
 * @package App\Http\Resources
 */
class WeChatQrResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            //状态即是否过期
            "state" => $this->created_at->addSecond($this->expire_seconds) > now()
        ];
    }
}
