<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 微信群发消息
 * @package App\Http\Resources
 */
class WeChatSendAllResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request) + [
            'material' => $this->material,
        ];
    }
}
