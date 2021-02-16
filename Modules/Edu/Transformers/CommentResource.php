<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\UserResource;

/**
 * 评论资源
 * @package Modules\Edu\Transformers
 */
class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'content' => $this->content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user' => new UserResource($this->whenLoaded('user')),
            'permissions' => $this->permissions,
            'reply_user' => new UserResource($this->whenLoaded('replyUser')),
            'comment_id' => $this->comment_id,
            'comment_type' => $this->comment_type,
            'commentable' => $this->commentable
        ];
    }
}
