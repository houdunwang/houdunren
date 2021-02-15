<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Comment;

/**
 * 评论
 * @package Modules\Edu\Api
 */
class CommentController extends Controller
{
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return $this->message('评论删除成功');
    }
}
