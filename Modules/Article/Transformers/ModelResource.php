<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 模型资源
 * @package Modules\Article\Transformers
 */
class ModelResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'categories' => CategoryResource::collection($this->whenloaded('categories')),
            'user' => $this->whenloaded('user')
        ]
            + parent::toArray($request);
    }
}
