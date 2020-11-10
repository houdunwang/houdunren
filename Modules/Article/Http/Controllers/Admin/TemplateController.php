<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use Illuminate\Http\Request;

/**
 * 模板选择
 * @package App\Http\Controllers\Article
 */
class TemplateController extends Controller
{
  public function index()
  {
    $templates = site()->templates;
    return view('article::admin.template.index', compact('templates'));
  }

  public function set(Request $request, Template $template)
  {
    site()->fill(['template_id' => $template['id']])->save();

    return back()->with('success', '模板设置成功');
  }
}
