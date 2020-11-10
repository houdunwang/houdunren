<?php

namespace Modules\Article\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Controller;
use Illuminate\Http\Request;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Entities\ArticleModel;
use Modules\Article\Http\Requests\CategoryRequest;

/**
 * 栏目管理
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
  public function index()
  {
    $categories = ArticleCategory::allCategory();
    return view('article::admin.category.index', compact('categories'));
  }

  public function create(ArticleCategory $category)
  {
    $models = ArticleModel::site()->get();
    $categories = ArticleCategory::allCategory();
    return view('article::admin.category.create', compact('models', 'categories', 'category'));
  }

  public function store(CategoryRequest $request, ArticleCategory $category)
  {
    $category->create($request->input() + ['site_id' => site()['id'], 'user_id' => user()['id']]);
    return redirect()->route('article.admin.category.index')->with('success', '栏目添加成功');
  }

  public function edit(ArticleCategory $category)
  {
    $models = ArticleModel::site()->get();
    $categories = ArticleCategory::allCategory($category);

    return view('article::admin.category.edit', compact('models', 'categories', 'category'));
  }

  public function update(CategoryRequest $request, ArticleCategory $category)
  {
    $category->fill($request->input())->save();
    return redirect()->route('article.admin.category.index')->with('success', '栏目修改成功');
  }

  public function destroy(ArticleCategory $category)
  {
    $category->delete();
    return ['message' => '栏目删除成功'];
  }
}
