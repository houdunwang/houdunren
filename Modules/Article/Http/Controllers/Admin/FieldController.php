<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\ArticleField;
use Modules\Article\Entities\ArticleModel;
use Modules\Article\Http\Requests\FieldRequest;

/**
 * 扩展字段
 * @package Modules\Article\Http\Controllers\Admin
 */
class FieldController extends Controller
{
  public function index(ArticleModel $model)
  {
    return view('article::admin.field.index', compact('model'));
  }

  public function create(ArticleModel $model)
  {
    return view("article::admin.field.create", compact('model'));
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
    return view('article::admin.field.edit', compact('field'));
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
