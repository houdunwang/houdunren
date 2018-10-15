<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentArticleRequest;
use App\Models\Article;
use App\Models\ContentArticle;
use App\Models\ContentCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Content-article');
    }

    public function index()
    {
        $articles = ContentArticle::latest()->paginate(module_config('content.list_row'));
        return view('content.article_index', compact('articles'));
    }

    //选择栏目
    public function selectCategory(ContentCategory $category)
    {
        $categories = $category->tree();
        return view('content.article_select_category', compact('categories'));
    }

    public function create(ContentArticle $article, Request $request)
    {
        $category = ContentCategory::find($request->query('category_id'));
        $extendField = $article->extendField($category);
        return view('content.article_create', compact('article', 'category', 'extendField'));
    }

    public function store(ContentArticleRequest $request, ContentArticle $article)
    {
        $article->user()->associate(auth()->user())->fill($request->except('_token'))->save();
        return redirect(route('content.article.index'))->with('success', '文章发表成功');
    }

    public function show(ContentArticle $contentArticle)
    {
    }

    public function edit(ContentArticle $article, Request $request)
    {
        $category = $article->category;
        $extendField = $article->extendField($category);
        return view('content.article_edit', compact('article', 'category', 'extendField'));
    }

    public function update(ContentArticleRequest $request, ContentArticle $article)
    {
        $article->update($request->all());
        return redirect(route('content.article.index'))->with('success', '文章修改成功');
    }

    public function destroy(ContentArticle $article)
    {
        $article->delete();
        return redirect(route('content.article.index'))->with('success', '文章删除成功');
    }
}
