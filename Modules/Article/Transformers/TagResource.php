<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 标签资源
 * @package Modules\Article\Transformers
 */
class TagResource extends JsonResource
{
    public function toArray($request)
    {
        return ['user' => $this->whenLoaded('user')] + parent::toArray($request);
    }
}
