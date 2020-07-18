<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        $comment =  parent::toArray($request);
        $comment['created_at'] = $this->created_at->diffForHumans();
        $comment['user'] = $this->getUser();
        $comment['html'] = $this->html;
        return $comment;
    }

    protected function getUser()
    {
        $user = $this->user;
        return ['avatar' => $user->icon, 'id' => $user->id, 'name' => $user->name];
    }
}
