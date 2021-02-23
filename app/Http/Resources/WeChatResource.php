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
        return [
            'id' => $this->id,
            'site_id' => $this->site_id,
            'title' => $this->title,
            'introduce' => $this->introduce,
            'name' => $this->name,
            'qr' => $this->qr,
            'type' => $this->type,
            'welcome' => $this->welcome,
            'default_message' => $this->default_message,
            'created_at' => $this->created_at,
            'qr' => $this->qr,
            'updated_at' => $this->updated_at,
        ];
    }
}
