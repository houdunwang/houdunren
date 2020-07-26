<?php

namespace Modules\Edu\Transformers;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
{
  public function toArray($request)
  {
    $comment = parent::toArray($request);
    $comment['created_at'] = $this->created_at->diffForHumans();
    $comment['user'] = new UserResource($this->user);
    $comment['reply_user'] = new UserResource(User::firstOrNew(['id' => $this->reply_user_id]));
    $comment['html'] = $this->html;
    return $comment;
  }
}
