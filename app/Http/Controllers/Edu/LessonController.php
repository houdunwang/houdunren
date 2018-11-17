<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\EduLesson;
use App\Models\EduTag;
use App\Repositories\EduLessonRepository;
use App\Repositories\EduVideoRepository;
use Illuminate\Http\Request;

/**
 * 课程管理
 * Class LessonController
 * @package App\Http\Controllers\Edu
 */
class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-lesson', ['except' => ['lists', 'show']]);
    }

    /**
     * 后台课程列表
     * @param Request $request
     * @param EduLessonRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request, EduLessonRepository $repository)
    {
        session(['url.intended' => $request->fullUrl()]);;
        $lessons = $repository->paginate(20, ['*'], 'updated_at');
        return view('edu.lesson.index', compact('lessons'));
    }

    /**
     * 字段验证
     * @param $data
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validation($data)
    {
        \Validator::make($data, [
            'title' => 'required|max:60',
            'description' => 'nullable|max:100',
            'thumb' => ['required', 'regex:/(jpeg|jpg|png|gif)$/i'],
            'type' => 'required|in:system,video',
            'free' => 'required|in:1,0',
            'subscibe_play' => 'nullable|in:1,0',
            'click' => 'required|numeric',
            'free_num' => 'required',
            'price' => 'nullable|between:0,1000',
            'status' => 'required|in:1,0',
            'download_address' => 'nullable|sometimes|url',
            'json' => 'json',
        ], [
            'title.required' => '课程名称不能为空',
            'title.max' => '课程名称最多60个字',
            'thumb.regex' => '请上传课程预览图片',
            'thumb.required' => '课程图片不能为空',
            'download_address.url' => '下载地址必须是合法的网址',
        ])->validate();
    }

    /**
     * 新增
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $field = [
            'lesson' => [
                'title' => '',
                'type' => 'video',
                'description' => '',
                'thumb' => asset('images/nopic.jpg'),
                'download_address' => '',
                'click' => 0,
                'status' => 1,
                'free' => 1,
                'subscibe_play' => 1,
                'free_num' => 3,
                'price' => 0,
                'is_commend' => 0,
                'is_hot' => 0,
            ],
            'videos' => [],
        ];
        return view('edu.lesson.create', compact('field'));
    }

    /**
     * 保存
     * @param Request $request
     * @param EduLessonRepository $repository
     * @param EduVideoRepository $eduVideoRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request, EduLessonRepository $repository, EduVideoRepository $eduVideoRepository)
    {
        $field = \json_decode($request->get('field'), true);

        $this->validation($field['lesson']);
        //添加课程
        $lesson = $repository->create($field['lesson']);
        //添加视频
        $eduVideoRepository->createManyVideo($lesson, $field['videos']);

        return redirect(route('edu.lesson.index'))->with('success', '课程添加成功');
    }

    /**
     * 前台碎片课程列表
     * @param Request $request
     * @param EduLessonRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lists(Request $request, EduLessonRepository $repository)
    {
        session(['url.intended' => $request->fullUrl()]);
        $lessons = $repository->lists();
        return view('edu.lesson.lists', compact('lessons'));
    }

    /**
     * 显示课程
     * @param EduLesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(EduLesson $lesson)
    {
        return view('edu.lesson.show', compact('lesson'));
    }

    /**
     * 编辑
     * @param EduLesson $lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function edit(EduLesson $lesson)
    {
        $this->authorize('update', $lesson);
        $field = ['lesson' => $lesson->toArray(), 'videos' => $lesson->video->toArray()];
        return view('edu.lesson.edit', compact('field', 'lesson'));
    }

    /**
     * 更新课程
     * @param Request $request
     * @param EduLesson $lesson
     * @param EduLessonRepository $repository
     * @param EduVideoRepository $eduVideoRepository
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(
        Request $request,
        EduLesson $lesson,
        EduLessonRepository $repository,
        EduVideoRepository $eduVideoRepository
    ) {
        $this->authorize('update', $lesson);
        $field = json_decode($request->get('field'), true);
        $this->validation($field['lesson']);
        $repository->update($lesson, $field['lesson']);

        $eduVideoRepository->updateManyVideo($lesson, $field['videos']);

        return redirect()->intended(route('edu.lesson.index'))->with('success', '课程编辑成功');
    }

    /**
     * 删除课程与视频
     * @param EduLesson $lesson
     * @param EduLessonRepository $repository
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(EduLesson $lesson, EduLessonRepository $repository)
    {
        $repository->delete($lesson);

        return redirect(route('edu.lesson.index'))->with('success', '课程删除成功');
    }
}
