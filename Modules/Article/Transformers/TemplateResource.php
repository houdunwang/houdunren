<?php

namespace Modules\Article\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 模板风格资源
 * @package Modules\Article\Transformers
 */
class TemplateResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'selected' => config('module.template') == $this['name']
        ] + parent::toArray($request);
    }
}
