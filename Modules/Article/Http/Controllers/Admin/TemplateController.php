<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Template;
use App\Services\TemplateService;
use Illuminate\Http\Request;

/**
 * 模板选择
 * @package App\Http\Controllers\Article
 */
class TemplateController extends Controller
{
  public function index(TemplateService $templateService)
  {
    $templates = $templateService->getSiteTemplates(site());

    return view('article::admin.template.index', compact('templates'));
  }

  public function set(Request $request, Template $template)
  {
    site()->fill(['template_id' => $template['id']])->save();

    return back()->with('success', '模板设置成功');
  }
}
