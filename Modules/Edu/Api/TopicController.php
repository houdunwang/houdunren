<?php

namespace Modules\Edu\Api;

use Auth;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Database\Eloquent\MassAssignmentException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use InvalidArgumentException;
use LogicException;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\TopicRequest;
use Modules\Edu\Transformers\TopicResource;
use ActivityService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use DB;

/**
 * 贴子管理
 * @package Modules\Edu\Http\Controllers\Front
 */
class TopicController extends Controller
{
    public function __construct()
    {
    }

    /**
     * 贴子列表
     * @param Request $request
     * @return View|Factory
     * @throws InvalidCastException
     * @throws LogicException
     * @throws BindingResolutionException
     */
    public function index(Request $request)
    {
        $topics = Topic::search($request->query('w'))->where('site_id', SID)->latest()->with('user')->paginate(10);
        return TopicResource::collection($topics);
    }

    /**
     * 保存
     * @param TopicRequest $request
     * @param Topic $topic
     * @return string
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws MassAssignmentException
     */
    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->fill($request->input());
        $topic->site_id = site()['id'];
        $topic->user_id = Auth::id();
        $topic->save();
        $topic->tags()->sync($request->tags);
        ActivityService::log($topic);
        return $this->message('贴子发表成功', $topic);
    }

    /**
     * 获取评论
     * @param Topic $topic
     * @return TopicResource
     */
    public function show(Topic $topic)
    {
        return new TopicResource($topic->load(['user', 'tags']));
    }

    /**
     * 更新贴子
     * @param Request $request
     * @param Topic $topic
     * @return string[]
     * @throws MassAssignmentException
     * @throws InvalidArgumentException
     */
    public function update(Request $request,  Topic $topic)
    {
        $topic->fill($request->input())->save();
        $topic->tags()->sync($request->input('tags'));
        return $this->message('贴子发表成功', $topic);
    }

    /**
     * 删除
     * @param Request $request
     * @param Topic $topic
     * @return JsonResponse
     * @throws Exception
     * @throws BindingResolutionException
     */
    public function destroy(Request $request, Topic $topic)
    {
        DB::beginTransaction();
        $topic->delete();
        DB::commit();
        return response()->json(['message' => '贴子删除成功']);
    }

    /**
     * 设置或取消推荐
     * @param Topic $topic
     * @return string[]
     * @throws InvalidArgumentException
     */
    public function recommend(Topic $topic)
    {
        $this->authorize('recommend', $topic);
        $topic->recommend = !$topic->recommend;
        $topic->save();
        return $this->message('推荐修改成功', new TopicResource($topic->load('user')));
    }

    /**
     * 推荐贴子列表
     * @return AnonymousResourceCollection
     */
    public function recommendList()
    {
        $topics = Topic::where('site_id', SID)->where('recommend', 1)->with('user')->latest()->get();
        return TopicResource::collection($topics);
    }
}
