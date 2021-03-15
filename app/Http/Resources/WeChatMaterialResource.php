<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 素材资源
 * @package App\Http\Resources
 */
class WeChatMaterialResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
