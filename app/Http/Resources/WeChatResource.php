<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 微信公众号
 * @package App\Http\Resources
 */
class WeChatResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
