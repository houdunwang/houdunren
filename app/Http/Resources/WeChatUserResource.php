<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 微信粉丝
 * @package App\Http\Resources
 */
class WeChatUserResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [];
    }
}
