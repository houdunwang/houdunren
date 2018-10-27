<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChapterRequest;
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
    public function __construct()
    {
        $this->middleware('auth', ['except' => '']);
    }

    public function index()
    {
    }

    public function create(Request $request)
    {
        $document = EduDocument::find($request->query('document_id'));
        return view('edu.document.chapter_create', compact('document'));
    }

    public function store(ChapterRequest $request)
    {
        $chapter = EduChapter::create($request->all());
        return redirect(route('edu.chapter.edit',[$chapter,'document_id' => $request->document_id]))->with('success','添加成功');
    }

    public function show(DocContent $docContent)
    {
        return response()->json($docContent);
    }


    public function edit(Request $request,EduChapter $chapter)
    {
        $document = EduDocument::find($request->query('document_id'));

        return view('edu.document.chapter_edit', compact('chapter','document'));
    }

    public function update(ChapterRequest $request, EduChapter $chapter)
    {
        $chapter->update($request->all());
        return back()->with('success','修改成功');
    }


    public function destroy(DocContent $docContent)
    {
        //
    }
}
