<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Controller;
use Modules\Article\Entities\ArticleModel;
use Modules\Article\Http\Requests\ModelRequest;

class ModelController extends Controller
{
  public function index()
  {
    $models = ArticleModel::site()->get();
    return view('article::admin.model.index', compact('models'));
  }

  public function create()
  {
    return view('article::admin.model.create');
  }

  public function store(ModelRequest $request, ArticleModel $model)
  {
    $model->site_id = site_id();
    $model->fill($request->input() + ['fields' => []])->save();

    return redirect()->route('article.admin.model.index')->with('success', '模型添加成功');
  }

  public function edit(ArticleModel $model)
  {
    return view('article::admin.model.edit', compact('model'));
  }

  public function update(ModelRequest $request, ArticleModel $model)
  {
    $model->fill($request->input())->save();
    return redirect()->route('article.admin.model.index')->with('success', '模型修改成功');
  }

  public function destroy(ArticleModel $model)
  {
    $model->delete();
    return response()->json(['message' => '模型删除成功']);
  }
}
