<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Comment;

class CommentController extends ApiController
{
  public function index()
  {
    return view('edu::index');
  }

  public function favour(Comment $comment)
  {
    $comment->favour()->toggle(Auth::id());
    $comment['favour_count'] = $comment->favour->count();
    $comment->save();
    return $this->json($comment);
  }
}
