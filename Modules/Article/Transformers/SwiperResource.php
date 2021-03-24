<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 幻灯片资源
 * @package Modules\Article\Transformers
 */
class SwiperResource extends JsonResource
{
    public function toArray($request)
    {
        return   [] + parent::toArray($request);
    }
}
