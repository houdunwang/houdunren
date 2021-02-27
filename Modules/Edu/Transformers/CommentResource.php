<?php

namespace Modules\Edu\Transformers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Modules\Edu\Entities\Comment;

/**
 * 评论资源
 * @package Modules\Edu\Transformers
 */
class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'user' => new UserResource($this->user),
            'replys' => self::collection($this->whenLoaded('replys')),
            // 'parent' => $this->when($this->reply_id, new self(Comment::find($this->reply_id)))
        ] + parent::toArray($request);
    }
}
