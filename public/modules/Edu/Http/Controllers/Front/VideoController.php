<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Traits\Comment;
use Modules\Edu\Entities\User;
use Modules\Edu\Entities\Video;
use Modules\Edu\Http\Requests\CommentRequest;
use Modules\Edu\Transformers\Front\CommentResource;
use Modules\Edu\Transformers\Front\VideoResource;

class VideoController extends ApiController
{
  public function index()
  {
  }
  public function create()
  {
    return view('edu::create');
  }
  public function store(Request $request)
  {
  }
  public function show(Video $video)
  {
    return $this->json(new VideoResource($video));
  }

  /**
   * 点赞
   * @param Video $video
   * @return JsonResponse
   */
  public function favour(Video $video)
  {
    $user = User::instance(Auth::user());
    $user->videoFavour()->toggle([$video['id']]);
    $video['favour_count'] =  $video->favour->count();
    $video->save();
    return $this->json(new VideoResource($video));
  }

  /**
   * 收藏
   * @param Video $video
   * @return JsonResponse
   */
  public function favorite(Video $video)
  {
    $user =  User::instance(Auth::user());
    $user->videFavorite()->toggle([$video['id']]);
    $video['favorite_count'] = $video->favorite->count();
    $video->save();
    return $this->json(new VideoResource($video));
  }

  /**
   * 发表评论
   * @param Request $request
   * @param Video $video
   * @return JsonResponse
   */
  public function comment(CommentRequest $request, Video $video)
  {
    $video->comment()->attach($video['id'], [
      'site_id' => site()['id'],
      'user_id' => Auth::id(),
      'content' => $request->content,
    ]);
    $video->comment_count = $video->comment()->count();
    $video->save();

    return $this->success('发表成功');
  }

  public function componentList(Video $video)
  {
    return $this->json(CommentResource::collection($video->comment));
  }
}
