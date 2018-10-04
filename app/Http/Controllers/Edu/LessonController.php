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
use App\Models\Lesson;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['lists']]);
    }

    public function index()
    {
        $lessons = Lesson::where('user_id', auth()->id())->paginate(20);
        return view('edu.lesson_index', compact('lessons'));
    }

    public function lists()
    {
        $lessons = Lesson::with('user')->paginate(10);
        return view('edu.lesson_lists', compact('lessons'));
    }

    protected function validation($data)
    {
        \Validator::make($data, [
            'title'            => 'required|max:60',
            'description'      => 'required|max:100',
            'thumb'            => ['required', 'regex:/(jpeg|jpg|png|gif)$/i'],
            'type'             => 'required|in:system,video',
            'free'             => 'required|in:1,0',
            'subscibe_play'    => 'required|in:1,0',
            'click'            => 'required|numeric',
            'free_num'         => 'required',
            'price'            => 'required|between:0,1000',
            'status'           => 'required|in:1,0',
            'download_address' => 'nullable|sometimes|url',
            'json'             => 'json',
        ], [
            'title.required'       => '课程名称不能为空',
            'title.max'            => '课程名称最多60个字',
            'thumb.regex'          => '请上传课程预览图片',
            'thumb.required'       => '课程图片不能为空',
            'download_address.url' => '下载地址必须是合法的网址',
        ])->validate();
    }

    public function create()
    {
        $field = [
            'lesson' => [
                'title'            => '',
                'type'             => 'video',
                'description'      => '',
                'thumb'            => asset('images/nopic.jpg'),
                'download_address' => '',
                'click'            => 0,
                'status'           => 1,
                'free'             => 1,
                'subscibe_play'    => 1,
                'free_num'         => 3,
                'price'            => 0,
                'is_commend'       => 0,
                'is_hot'           => 0,
            ],
            'videos' => [],
        ];
        return view('edu.lesson_create', compact('field'));
    }

    public function store(Request $request)
    {
        $field = json_decode($request->get('field'), true);
        $this->validation($field['lesson']);
        //添加课程
        $lesson = new Lesson($field['lesson']);
        $lesson->user()->associate(auth()->user());
        $lesson->save();

        //添加视频
        $lesson->video()->createMany($field['videos']);
        return redirect(route('edu.lesson.index'))->with('success', '课程添加成功');
    }

    public function show(Lesson $lesson)
    {
        $lesson = $lesson->with(['user', 'video'])->first();
        return view('edu.lesson_show', compact('lesson'));
    }

    public function edit(Lesson $lesson)
    {
        $this->authorize('update', $lesson);
        $field = ['lesson' => $lesson->toArray(), 'videos' => $lesson->video->toArray()];
        return view('edu.lesson_edit', compact('field', 'lesson'));
    }

    public function update(Request $request, Lesson $lesson)
    {
        $field = json_decode($request->get('field'), true);
        $this->validation($field['lesson']);
        $lesson->user()->associate(auth()->user())->update($field['lesson']);

        //软删除后添加视频
        $lesson->video()->delete();
        foreach ($field['videos'] as $video) {
            $lesson->video()->withTrashed()->updateOrCreate(['id' => $video['id'] ?? 0], $video)->restore();
        }
        //清除软件删除数据
        $lesson->video()->onlyTrashed()->forceDelete();
        return redirect(route('edu.lesson.index'))->with('success', '课程编辑成功');
    }

    public function destroy(Lesson $lesson)
    {
        $this->authorize('delete', $lesson);
        $lesson->video()->withTrashed()->forceDelete();
        $lesson->delete();
        return redirect(route('edu.lesson.index'))->with('success', '课程删除成功');
    }
}
