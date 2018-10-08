<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentModelRequest;
use App\Models\ContentModel;
use Illuminate\Http\Request;

class ModelController extends Controller
{
    public function index()
    {
        $models = ContentModel::get();
        return view('content.model_index', compact('models'));
    }

    public function create()
    {
        return view('content.model_create');
    }

    public function store(ContentModelRequest $request)
    {
        $data = $request->all();
        $data['fields'] = json_decode($data['fields'], true);
        ContentModel::create($data);
        return redirect(route('content.model.index'))->with('success', '模型添加成功');
    }

    public function show(ContentModel $contentModel)
    {
    }

    public function edit(ContentModel $model)
    {
        return view('content.model_edit', compact('model'));
    }

    public function update(ContentModelRequest $request, ContentModel $model)
    {
        $data = $request->all();
        $data['fields'] = json_decode($data['fields'], true);
        $model->update($data);
        return redirect(route('content.model.index'))->with('success', '修改模型成功');
    }

    public function destroy(ContentModel $model)
    {
        $model->delete();
        return back();
    }
}
