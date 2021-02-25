<?php

namespace Modules\Edu\Transformers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 动态资源
 * @package Modules\Edu\Transformers
 */
class ActivityResource extends JsonResource
{
    public function toArray($request)
    {
        $type = basename(str_replace('\\', '/', $this->subject_type));
        $resourceClass = 'Modules\Edu\Transformers\\' . $type . 'Resource';
        return [
            'type' => $type,
            'subject' => new $resourceClass($this->subject->load('user')),
            'user' => new UserResource($this->causer),
        ] + parent::toArray($request);
    }
}
