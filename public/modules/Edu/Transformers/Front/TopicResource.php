<?php

namespace Modules\Edu\Transformers\Front;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Auth;

class TopicResource extends JsonResource
{
    public function toArray($request)
    {
        $topic =  parent::toArray($request);
        $topic['user'] = $this->user;
        $topic['is_favour'] = Auth::check() ? $this->isFavour(Auth::user()) : false;
        $topic['is_favorite'] = Auth::check() ? $this->isFavorite(Auth::user()) : false;
        $topic['favour_users'] = $this->favour()->select(['users.id', 'avatar', 'name'])->limit(50)->get();
        $topic['tags'] = $this->tags;
        return $topic;
    }
}
