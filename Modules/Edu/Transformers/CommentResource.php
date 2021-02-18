<?php

namespace Modules\Edu\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * 评论资源
 * @package Modules\Edu\Transformers
 */
class CommentResource extends JsonResource
{
    public function toArray($request)
    {
        $content = markdown($this->content);
        return [
            'id' => $this->id,
            'title' => mb_substr(strip_tags($content), 0, 100, 'UTF-8'),
            'content' => $content,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'comment_id' => $this->comment_id,
            'comment_type' => $this->comment_type,
            'commentable' => $this->commentable,
            'user' => $this->user,
            'permissions' => $this->permissions,
            'replys' => self::collection($this->whenLoaded('replys')),
            'page'=>
        ];
    }
}
