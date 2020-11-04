<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Auth\Controller;
use App\Models\ArticleConfig;
use Illuminate\Http\Request;

class ConfigController extends Controller
{
  public function edit()
  {
    $config = ArticleConfig::where('site_id', site()['id'])->first();
    return view('article.config.edit', compact('config'));
  }

  public function update(Request $request)
  {
    ArticleConfig::updateOrCreate(
      ['site_id' => site()['id']],
      $request->input()
    );
    return back()->with('success', '配置项修改成功');
  }
}
