<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Comment;

class CommentController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }
    public function favour(Comment $comment)
    {
        $comment->favour()->toggle(Auth::id());
        $comment['site_id'] = SITEID;
        $comment['favour_count'] = $comment->favour->count();
        $comment->save();
        return $this->json($comment);
    }
}
