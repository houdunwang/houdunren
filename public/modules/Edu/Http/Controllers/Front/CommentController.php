<?php

namespace Modules\Edu\Http\Controllers\Front;

use Egulias\EmailValidator\Warning\Comment;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;

class CommentController extends Controller
{
  public function index()
  {
    return view('edu::index');
  }

  public function favour(Comment $comment)
  {
    $comment->favour()->toggle($comment['id']);
    $comment['favour_count'] = $comment->favour->count();
    $comment->save();
    return $this->success('点赞成功');
  }
}
