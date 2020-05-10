<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Edu\Transformers\Center\UserResource;

class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        $activity = parent::toArray($request);
        $activity['subject'] = $this->subject;
        $activity['user'] = new UserResource($this->causer);
        return $activity;
    }
}
