<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 文章资源
 * @package Modules\Article\Transformers
 */
class ContentResource extends JsonResource
{
    public function toArray($request)
    {
        return   [
            'tags' => $this->tags,
            'thumb' => $this->thumb ?? url('images/none.jpeg')
        ] + parent::toArray($request);
    }
}
