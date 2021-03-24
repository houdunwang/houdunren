<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 微信消息
 * @package App\Http\Resources
 */
class WeChatMessageResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
