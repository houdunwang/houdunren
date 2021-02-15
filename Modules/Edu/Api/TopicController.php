<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
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
use Modules\Edu\Entities\Tag;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\TopicRequest;
use App\Models\Site;
use Modules\Edu\Transformers\TopicResource;

/**
 * 贴子管理
 * @package Modules\Edu\Http\Controllers\Front
 */
class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
        $this->middleware(['front']);
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
     * @return string[]
     * @throws InvalidCastException
     * @throws LogicException
     * @throws InvalidArgumentException
     * @throws MassAssignmentException
     */
    public function store(TopicRequest $request, Site $site, Topic $topic)
    {
        $topic->fill($request->input());
        $topic->site_id = site()['id'];
        $topic->user_id = Auth::id();
        $topic->save();
        $topic->tags()->sync($request->tags);
        return ['message' => '贴子发表成功'];
    }

    /**
     * 单条
     *
     * @param Topic $topic
     * @return void
     */
    public function show(Topic $topic)
    {
        return new TopicResource($topic->load('user'));
    }

    public function update(Request $request,  Topic $topic)
    {
        $topic->fill($request->input())->save();
        $topic->tags()->sync($request->input('tags'));
        return ['message' => '贴子发表成功'];
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
        $topic->delete();
        return response()->json(['message' => '贴子删除成功']);
    }

    /**
     * 推荐
     * @param Topic $topic
     * @return string[]
     * @throws InvalidArgumentException
     */
    public function recommend(Topic $topic)
    {
        $topic->recommend = !$topic->recommend;
        $topic->save();
        return ['message' => '推荐修改成功'];
    }
}
