<?php

namespace Modules\Edu\Transformers\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class VideoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $resource =  parent::toArray($request);

        return $resource;
    }
}
