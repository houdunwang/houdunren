<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\ArticleModel;

/**
 * 内容表字段配置
 * @package App\Http\Controllers\Article
 */
class SystemFieldController extends Controller
{
  public function index(ArticleModel $model)
  {
    return view('article::admin.systemField.index', compact('model'));
  }

  public function edit(ArticleModel $model, string $name)
  {
    $field = $model->systemFields[$name];
    return view('article::admin.systemField.edit', compact('model', 'field'));
  }

  public function update(Request $request, ArticleModel $model, string $name)
  {
    $fields = $model->systemFields->toArray();

    $fields[$name] =  $request->except(['_token', '_method']) + $fields[$name];
    $model['content_fields'] = $fields;
    $model->save();
    return redirect()->route('article.admin.system.field.index', $model)->with('success', '系统字段修改成功');
  }
}
