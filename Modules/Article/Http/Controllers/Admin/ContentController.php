<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Entities\ArticleContent;
use Modules\Article\Http\Requests\ContentRequest;

/**
 * 文章内容管理
 * @package App\Http\Controllers\Article
 */
class ContentController extends Controller
{
  public function index()
  {
    $contents = ArticleContent::where('site_id', site()['id'])->latest()->paginate();
    return view('article::admin.content.index', compact('contents'));
  }

  public function category()
  {
    $categories = ArticleCategory::allCategory();
    return view('article::admin.content.category', compact('categories'));
  }

  public function create(ArticleCategory $category, ArticleContent $content)
  {
    return view('article::admin.content.create', compact('category', 'content'));
  }

  public function store(ContentRequest $request, ArticleContent $content)
  {
    $content->create(
      $request->input() + ['site_id' => site()['id'], 'user_id' => user()['id']]
    );

    return redirect()->route('article.admin.content.index')->with('success', '文章发表成功');
  }

  public function edit(ArticleContent $content)
  {
    $categories = ArticleCategory::allCategory();
    return view('article::admin.content.edit', compact('categories', 'content'));
  }

  public function update(ContentRequest $request, ArticleContent $content)
  {
    $content->fill($request->input())->save();
    return redirect()->route('article.admin.content.index')->with('success', '文章修改成功');
  }

  public function destroy(ArticleContent $content)
  {
    $content->delete();
    return ['message' => '文章删除成功'];
  }
}
