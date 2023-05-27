<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Topic;
use App\Http\Requests\StoreTopicRequest;
use App\Http\Requests\UpdateTopicRequest;
use App\Http\Resources\TopicResource;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(['index', 'show', 'user', 'recommendList']);
    }

    public function index()
    {
        $topics = Topic::with(['user'])->latest('updated_at')->paginate(10);
        return TopicResource::collection($topics);
    }

    //用户贴子列表
    public function user(User $user)
    {
        $topics = $user->topics()->with(['user'])->latest('updated_at')->paginate(10);
        return TopicResource::collection($topics);
    }

    public function store(StoreTopicRequest $request, Topic $topic)
    {
        rateLimiter('topic-store' . Auth::id(), 1, function () use ($topic, $request) {
            DB::beginTransaction();
            $topic->fill($request->input());
            $topic->user_id = Auth::id();
            $topic->save();

            if ($request->tags) $topic->tags()->toggle($request->tags);
            DB::commit();
        });

        return $this->respondWithSuccess($topic->refresh());
    }

    public function show(Topic $topic)
    {
        $topic['is_favour'] = $topic->whereRelation('favours', 'user_id', Auth::id())->exists();
        $topic['is_favorite'] = $topic->whereRelation('favorites', 'user_id', Auth::id())->exists();
        $topic->html = $topic->html;
        return new TopicResource($topic->load('user'));
    }

    public function update(UpdateTopicRequest $request, Topic $topic)
    {
        $this->authorize('update', $topic);
        $topic->fill($request->input())->save();

        return $this->respondOk('贴子更新成功');
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->respondOk('贴子删除成功');
    }

    //推荐贴子列表
    public function recommendList()
    {
        $topics = Topic::where('recommend', true)->with(['user'])->orderBy('updated_at', 'desc')->get();
        return TopicResource::collection($topics);
    }

    //推荐切换
    public function recommend(Topic $topic)
    {
        $this->authorize('recommend', $topic);
        $topic->recommend = !$topic->recommend;
        $topic->save();
        $topic->refresh();
        $topic->html = $topic->html;

        return $this->respondWithSuccess($topic);
    }
}
