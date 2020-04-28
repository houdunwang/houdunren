<?php

namespace Modules\Edu\Transformers\Center;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 获取用户资源
 * @package App\Http\Resources
 */
class UserResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
