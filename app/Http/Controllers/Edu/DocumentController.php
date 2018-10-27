<?php

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduCategoryRequest;
use App\Http\Requests\EduDocumentRequest;
use App\Models\EduChapter;
use App\Models\EduDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 手册文档管理
 * Class DocumentController
 * @package App\Http\Controllers\Edu
 */
class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    //展示文档数据列表
    public function index()
    {
        //获取所有文档数据
        $documents = EduDocument::latest()->paginate(10);
        return view('edu.document.index', compact('documents'));
    }

    //会员文档管理
    public function manage()
    {
        //获取所有文档数据
        $documents = EduDocument::where('user_id', auth()->id())->paginate(10);
        return view('edu.document.manage', compact('documents'));
    }

    public function create()
    {
        return view('edu.document.document_create');
    }

    public function store(EduDocumentRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = auth()->id();
        $document = EduDocument::create($data);
//        return redirect(route('edu.chapter.create',['document_id'=>$document]));
        return redirect(route('edu.document.edit', $document));
    }

    public function show()
    {
    }

    public function edit(EduDocument $document)
    {
        return view('edu.document.document_edit', compact('document'));
    }

    public function update(Request $request, EduDocument $document)
    {
        $document->update($request->all());
        return back()->with('success', '修改成功');

        //文章更新
//        if ($request->docConntent_id) {
//            $documentContent = DocContent::find($request->docConntent_id);
//            $documentContent->markdown_content = $request['editormd-markdown-doc'] ?: '';
//            $documentContent->html_content = $request['editormd-html-code'] ?: '';
//            $documentContent->save();
//        }
    }

    public function destroy(EduDocument $document)
    {
        $document->delete();
        return back();
    }
}
