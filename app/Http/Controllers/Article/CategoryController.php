<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Auth\Controller;
use App\Http\Requests\Article\CategoryRequest;
use App\Models\ArticleCategory;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

/**
 * 栏目管理
 * @package App\Http\Controllers
 */
class CategoryController extends Controller
{
  public function index()
  {
    $categories = ArticleCategory::allCategory();
    return view('article.category.index', compact('categories'));
  }

  public function create()
  {
    $models = ArticleModel::site()->get();
    $categories = ArticleCategory::allCategory();
    return view('article.category.create', compact('models', 'categories'));
  }

  public function store(CategoryRequest $request, ArticleCategory $category)
  {
    $category->create($request->input() + ['site_id' => site()['id'], 'user_id' => user()['id']]);
    return redirect()->route('article.category.index')->with('success', '栏目添加成功');
  }

  public function edit(ArticleCategory $category)
  {
    $models = ArticleModel::site()->get();
    $categories = ArticleCategory::allCategory($category);

    return view('article.category.edit', compact('models', 'categories', 'category'));
  }

  public function update(CategoryRequest $request, ArticleCategory $category)
  {
    $category->fill($request->input())->save();
    return redirect()->route('article.category.index')->with('success', '栏目修改成功');
  }

  public function destroy(ArticleCategory $category)
  {
    $category->delete();
    return ['message' => '栏目删除成功'];
  }
}
