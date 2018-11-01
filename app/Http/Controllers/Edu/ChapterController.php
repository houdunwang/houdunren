<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Http\Requests\EduChapterRequest;
use App\Models\EduChapter;
use App\Models\EduDocument;
use Illuminate\Http\Request;

/**
 * 手册章节管理
 * Class ChapterController
 * @package App\Http\Controllers\Edu
 */
class ChapterController extends Controller
{
    protected $document;

    public function __construct(Request $request)
    {
        $this->middleware('auth', ['except' => '']);
        if ($document = $request->query('document_id')) {
            $this->document = EduDocument::findOrFail($document);
        }
    }

    public function create(Request $request, EduChapter $chapter)
    {
        $document = $this->document;
        return view('edu.document.chapter_create', compact('document'));
    }

    public function store(EduChapterRequest $request)
    {
        $chapter = EduChapter::create($request->all());

        return redirect(route('edu.chapter.edit', [$chapter, 'document_id' => $request->document_id]))->with('success',
            '添加成功');
    }

    public function edit(Request $request, EduChapter $chapter)
    {
        $this->authorize('update', $chapter);
        $document = $chapter->document;

        return view('edu.document.chapter_edit', compact('chapter', 'document'));
    }

    public function update(EduChapterRequest $request, EduChapter $chapter)
    {
        $this->authorize('update', $chapter);
        $chapter->update($request->all());
        return back()->with('success', '修改成功');
    }

    public function destroy(Request $request, EduChapter $chapter)
    {
        $this->authorize('delete', $chapter);
        $document = $request->query('document_id');
        $chapter->delete();

        return redirect(route('edu.document.edit', $document))->with('success', '删除成功');
    }
}
