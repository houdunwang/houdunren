<?php

namespace Modules\Edu\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\System;
use Modules\Edu\Http\Requests\SystemLessonRequest;
use Modules\Edu\Http\Requests\SystemRequest;
use Auth;
use Modules\Edu\Transformers\SystemLessonResource;

/**
 * 系统课程管理
 * @package Modules\Edu\Http\Controllers\Admin
 */
class SystemController extends Controller
{
    public function index()
    {
        $lessons = System::latest()->paginate(10);
        return inertia('Admin/System/Index', compact('lessons'));
    }

    /**
     * 视图
     *
     * @return void
     */
    public function create()
    {
        return inertia('Admin/System/Form');
    }

    public function store(SystemLessonRequest $request, System $system)
    {
        $system->fill($request->input() + [
            'user_id' => Auth::id(),
            'site_id' => site()->id
        ])->save();

        $this->updateLesson($system, $request);

        return redirect()->route('Edu.admin.system.index')->with('success', '课程保存成功');
    }

    /**
     * 编辑视图
     *
     * @param System $system
     * @return void
     */
    public function edit(System $system)
    {
        return inertia('Admin/System/Form', ['systemLesson' => new SystemLessonResource($system)]);
    }

    /**
     * 更新课程
     *
     * @param SystemLessonRequest $request
     * @param System $system
     * @return void
     */
    public function update(SystemLessonRequest $request, System $system)
    {
        $system->fill($request->input())->save();
        $this->updateLesson($system, $request);

        return redirect()->route('Edu.admin.system.index')->with('success', '课程保存成功');
    }

    /**
     * 更新系统课程的课程表
     *
     * @param System $system
     * @param Request $request
     * @return void
     */
    protected function updateLesson(System $system, Request $request)
    {
        //使用id做为索引，并过滤掉无效字段用于system_lesson中间表
        $lessons = collect($request->lessons)->map(
            fn ($lesson, $key) => ['lesson_id' => $lesson['id'], 'rank' => $key]
        )->keyBy('lesson_id');

        $system->lessons()->sync($lessons);
    }

    public function destroy(System $system)
    {
        $system->delete();
        return response()->json(['message' => '课程删除成功']);
    }
}