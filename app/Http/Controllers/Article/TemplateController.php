<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Models\ArticleConfig;
use App\Models\Template;
use Illuminate\Http\Request;

class TemplateController extends Controller
{
  public function index()
  {
    $templates = site()->templates;
    return view('article.template.index', compact('templates'));
  }

  public function set(Request $request, Template $template)
  {
    site()->fill(['template_id' => $template['id']])->save();

    return back()->with('success', '模板设置成功');
  }
}
