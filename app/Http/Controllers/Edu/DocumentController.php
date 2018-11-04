<?php

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduCategoryRequest;
use App\Http\Requests\EduDocumentRequest;
use App\Models\EduChapter;
use App\Models\EduDocument;
use Couchbase\Document;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 手册文档管理
 * Class DocumentController
 *
 * @package App\Http\Controllers\Edu
 */
class DocumentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    //展示文档数据列表
    public function index()
    {
        //获取所有文档数据
        $documents = EduDocument::orderBy('flag', 'desc')->orderBy('updated_at', 'desc')->paginate(10);

        return view('edu.document.index', compact('documents'));
    }

    //会员文档管理
    public function manage()
    {
        //获取所有文档数据
        $documents = EduDocument::where('user_id', auth()->id())->paginate(10);
        return view('edu.document.manage', compact('documents'));
    }

    //置顶
    public function flag(EduDocument $document)
    {
        $this->authorize('flag', $document);
        if ($document->flag) {
            $document->flag = 0;
        } else {
            $document->flag = 1;
        }
        $document->save();

        return redirect()->back();
    }

    public function create(EduDocument $document)
    {

        return view('edu.document.document_create');
    }

    public function store(EduDocumentRequest $request)
    {

        $data = $request->all();
        $data['user_id'] = auth()->id();
        $document = EduDocument::create($data);

        return redirect(route('edu.document.edit', $document));
    }

    public function show(EduDocument $document)
    {
        return view('edu.document.document_show', compact('document'));
    }

    public function edit(EduDocument $document)
    {

        $this->authorize('update', $document);

        return view('edu.document.document_edit', compact('document'));
    }

    public function update(EduDocumentRequest $request, EduDocument $document)
    {
        $this->authorize('update', $document);
        $document->update($request->all());

        return back()->with('success', '修改成功');
    }

    public function destroy(EduDocument $document)
    {
        $this->authorize('delete', $document);
        $document->delete();

        return back()->with('success', '删除成功');
    }
}
