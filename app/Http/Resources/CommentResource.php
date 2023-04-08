<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use GrahamCampbell\Markdown\Facades\Markdown;

class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'replys' => $this->when('replys', self::collection($this->replys)),
            'user' => new UserResource($this->whenLoaded('user')),
            'replyUser' => new UserResource($this->whenLoaded('replyUser')),
        ] + parent::toArray($request);
    }
}
