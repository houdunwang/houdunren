<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Edu\Entities\System;
use Modules\Edu\Http\Requests\SystemLessonRequest;
use Auth;
use Modules\Edu\Transformers\SystemLessonResource;
use App\Models\Site;
use Exception;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * 系统课程管理
 * @package Modules\Edu\Http\Controllers
 */
class SystemController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'show']);
        $this->authorizeResource(System::class, 'system');
    }

    /**
     * 课程列表
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $lessons = System::latest()->paginate(10);
        return SystemLessonResource::collection($lessons);
    }

    public function store(SystemLessonRequest $request, System $system)
    {
        $system->fill($request->input() + [
            'site_id' => site()->id,
            'user_id' => Auth::id(),
        ])->save();

        $this->updateLesson($system, $request);
        return ['message' => '课程保存成功'];
    }

    /**
     * 编辑视图
     * @param System $system
     * @return void
     */
    public function show(System $system)
    {
        return new SystemLessonResource($system->load('lessons'));
    }

    /**
     * 更新课程
     * @param SystemLessonRequest $request
     * @param System $system
     * @return void
     */
    public function update(SystemLessonRequest $request, System $system)
    {
        $system->fill($request->input())->save();
        $this->updateLesson($system, $request);
        return ['message' => '课程保存成功'];
    }

    /**
     * 更新系统课程的课程表
     * @param System $system
     * @param Request $request
     * @return void
     */
    protected function updateLesson(System $system, Request $request)
    {
        //使用id做为索引，并过滤掉无效字段用于system_lesson中间表
        $lessons = collect($request->lessons)
            ->map(fn ($lesson, $key) => ['lesson_id' => $lesson['id'], 'rank' => $key])
            ->keyBy('lesson_id');
        $system->lessons()->sync($lessons);
    }

    /**
     * 删除课程
     * @param Site $site
     * @param System $system
     * @return string[]
     * @throws Exception
     */
    public function destroy(Site $site, System $system)
    {
        $system->delete();
        return ['message' => '课程删除成功'];
    }
}
