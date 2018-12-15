<?php

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduSectionRequest;
use App\Models\EduChapter;
use App\Models\EduSection;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 文章-节
 * Class SectionController
 * @package App\Http\Controllers\Edu
 */
class SectionController extends Controller
{
    protected $chapter;

    public function __construct(Request $request)
    {
        $this->middleware('auth', [
            'except' => ['show'],
        ]);
        if ($chapter = $request->query('chapter_id')) {
            $this->chapter = EduChapter::findOrFail($chapter);
        }
    }

    public function create(Request $request, EduSection $section)
    {
        $section->title = '请输入节标题';
        $section->content = '请输入节内容';
        $section->chapter_id = $this->chapter->id;
        $section->save();
        return redirect(route('edu.section.edit', [$section, 'chapter_id' => $this->chapter]));

    }

    public function show(EduSection $section)
    {
        return view('edu.document.section_show', compact('section'));
    }

    public function edit(EduSection $section)
    {
        $this->authorize('update', $section);
        return view('edu.document.section_edit', ['section' => $section, 'chapter' => $this->chapter]);
    }

    public function update(EduSectionRequest $request, EduSection $section)
    {
        $this->authorize('update', $section);
        $section->update($request->all());

        return $request->expectsJson()
            ? response()->json(['message' => '已自动保存', 'code' => 1])
            : back()->with('success', '修改成功');
    }

    public function destroy(Request $request, EduSection $section)
    {
        $this->authorize('delete', $section);
        $section->delete();
        $chapter = $request->query('chapter_id');
        return redirect(route('edu.chapter.edit', $chapter))->with('success', '删除成功');
    }
}
