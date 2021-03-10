<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 菜单资源
 * @package Modules\Article\Transformers
 */
class MenuResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
