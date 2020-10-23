<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\FieldRequest;
use App\Models\ArticleField;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class FieldController extends Controller
{
  public function index(ArticleModel $model)
  {
    return view('article.field.index', compact('model'));
  }

  public function create(ArticleModel $model)
  {
    return view("article.field.create", compact('model'));
  }

  public function store(ArticleModel $model, FieldRequest $request, ArticleField $fieldModel)
  {
    $fieldModel->create($request->all() + ['site_id' => site()['id'], 'model_id' => $model['id']]);
    return response()->json(['message' => '字段添加成功']);
  }

  public function show(Request $request, ArticleField $field)
  {
    return $field;
  }

  public function edit(ArticleField $field)
  {
    return view('article.field.edit', compact('field'));
  }

  public function update(FieldRequest $request, ArticleField $field)
  {
    $field->fill($request->all())->save();
    return response()->json(['message' => '字段修改成功']);
  }

  public function destroy(ArticleField $field)
  {
    $field->delete();
    return ['message' => '模型字段删除成功'];
  }
}
