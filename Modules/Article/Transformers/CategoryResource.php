<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 栏目资源
 * @package Modules\Article\Transformers
 */
class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return ['model' => $this->model] + parent::toArray($request);
    }
}
