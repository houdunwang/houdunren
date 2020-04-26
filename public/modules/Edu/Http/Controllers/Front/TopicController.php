<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\Front\TopicRequest;
use Modules\Edu\Transformers\Front\TopicResource;

/**
 * 贴子管理
 * @package Modules\Edu\Http\Controllers\Front
 */
class TopicController extends ApiController
{
    public function __construct()
    {
        $this->middleware("auth:sanctum")->except(['index', 'show']);
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

    public function update(Request $request, $id)
    {
    }

    public function destroy(Topic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return $this->success('删除成功');
    }
}
