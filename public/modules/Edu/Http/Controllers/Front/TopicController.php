<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use App\Services\UserService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\CommentRequest;
use Modules\Edu\Http\Requests\Front\TopicRequest;
use Modules\Edu\Services\CommentService;
use Modules\Edu\Transformers\Front\CommentResource;
use Modules\Edu\Transformers\Front\TopicResource;

/**
 * 贴子管理
 * @package Modules\Edu\Http\Controllers\Front
 */
class TopicController extends ApiController
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(['index', 'show', 'commentList']);
    }

    /**
     * 收藏
     * @param Topic $topic
     * @return JsonResponse
     */
    public function favorite(Topic $topic)
    {
        $topic->favorite()->toggle(Auth::id());
        $topic->favorite_count = $topic->favorite()->count();
        $topic->save();
        return $this->json(new TopicResource($topic));
    }

    /**
     * 点赞
     * @param Topic $topic
     * @return JsonResponse
     */
    public function favour(Topic $topic)
    {
        $topic->favour()->toggle(Auth::id());
        $topic['favour_count'] =  $topic->favour()->count();
        $topic->save();
        return $this->json(new TopicResource($topic));
    }

    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $topics = Topic::latest('id')->when($keyword, function ($query, $keyword) {
            $query->where('title', 'like', "%{$keyword}%");
        })->paginate(15);
        return TopicResource::collection($topics);
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic['site_id'] = SITEID;
        $topic['title'] = $request->input('title');
        $topic['content'] = $request->input('content');
        $topic['user_id'] = Auth::id();
        $topic->save();
        $topic->tags()->sync($request->tags);
        return $this->success('发表成功');
    }

    public function show(Topic $topic)
    {
        return $this->json(new TopicResource($topic));
    }

    public function update(TopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->fill($request->all())->save();
        return $this->success('修改成功');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->success('删除成功');
    }

    /**
     * 发表评论
     * @param CommentRequest $request
     * @param Topic $topic
     * @param CommentService $commentService
     * @return JsonResponse|mixed
     */
    public function comment(CommentRequest $request, Topic $topic, CommentService $commentService)
    {
        if ($commentService->checkTime() === false) {
            return $this->error('请等待20秒后操作');
        }
        $topic->comment()->create([
            'site_id' => SITEID,
            'user_id' => Auth::id(),
            'reply_user_id' => $request->reply_user_id ?: null,
            'content' => $request->content,
        ]);
        $topic->comment_count = $topic->comment()->count();
        $topic->save();
        $commentService->record();
        return $topic->comment()->latest('id')->with(['user', 'reply'])->first();
    }

    /**
     * 评论列表
     * @param Topic $topic
     * @return JsonResponse
     */
    public function commentList(Topic $topic)
    {
        $comments = $topic->comment()->with(['user', 'reply'])->get();
        return $this->json(CommentResource::collection($comments));
    }
    /**
     * 推荐设置
     * @param Topic $topic
     * @return JsonResponse
     */
    public function commend(Topic $topic, UserService $userService)
    {
        if (!$userService->isAdmin(site(), Auth::user())) {
            return $this->error('你没有操作权限');
        }
        $topic['recommend'] = !$topic['recommend'];
        $topic->save();
        return $this->json(new TopicResource($topic));
    }
    /**
     * 推荐列表
     * @return JsonResponse
     */
    public function recommendList()
    {
        $topics = Topic::where('recommend', 1)->get();
        return $this->json(TopicResource::collection($topics));
    }
}
