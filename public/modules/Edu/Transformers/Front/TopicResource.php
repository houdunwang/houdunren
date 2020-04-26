<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;

class TopicResource extends JsonResource
{
    public function toArray($request)
    {
        $topic =  parent::toArray($request);
        $topic['user'] = $this->user;
        $topic['comment'] = $this->comment()->count();
        return $topic;
    }
}
