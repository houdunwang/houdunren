<?php

namespace Modules\Edu\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    public function toArray($request)
    {
        $resource =  parent::toArray($request);

        return $resource;
    }
}
