<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class SystemFieldController extends Controller
{
  public function index(ArticleModel $model)
  {
    return view('article.systemField.index', compact('model'));
  }

  public function edit(ArticleModel $model, string $name)
  {
    $field = $model->systemFields[$name];
    return view('article.systemField.edit', compact('model', 'field'));
  }

  public function update(Request $request, ArticleModel $model, string $name)
  {
    $fields = $model->systemFields->toArray();

    $fields[$name] =  $request->except(['_token', '_method']) + $fields[$name];
    $model['content_fields'] = $fields;
    $model->save();
    return redirect()->route('article.system.field.index', $model)->with('success', '系统字段修改成功');
  }
}
