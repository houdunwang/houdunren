<?php

namespace App\Http\Controllers\Edu;

use App\Models\EduSystemLesson;
use App\Http\Controllers\Controller;
use App\Repositories\EduSystemLessonRepository;
use Illuminate\Http\Request;

class SystemLessonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Edu-system-lesson', ['except' => ['show']]);
    }

    public function index(EduSystemLessonRepository $repository)
    {
        $lessons = $repository->all();
        return view('edu.system_lesson.index', compact('lessons'));
    }

    public function lists(EduSystemLessonRepository $repository)
    {
        $lessons = $repository->paginate(1);
        return view('edu.system_lesson.lists', compact('lessons'));
    }

    public function create()
    {
        return view('edu.system_lesson.create');
    }

    public function store(Request $request, EduSystemLessonRepository $repository)
    {
        $repository->create($request->all());
        return redirect()->route('edu.system.index')->with('success', '保存成功');
    }

    public function show(EduSystemLesson $system, EduSystemLessonRepository $repository)
    {
        $lessons = $repository->lesson($system);
        return view('edu.system_lesson.show', compact('lessons'));
    }

    public function edit(EduSystemLesson $system)
    {
        return view('edu.system_lesson.edit', ['lesson' => $system]);
    }

    public function update(Request $request, EduSystemLesson $system, EduSystemLessonRepository $repository)
    {
        $repository->update($system, $request->all());
        return redirect()->route('edu.system.index')->with('success', '修改成功');
    }

    public function destroy(EduSystemLesson $system, EduSystemLessonRepository $repository)
    {
        $repository->delete($system);
        return back()->with('success', '删除成功');
    }
}
