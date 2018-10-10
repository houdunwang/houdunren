<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContentArticleRequest;
use App\Models\ContentArticle;
use App\Models\ContentCategory;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        return view('content.article_index');
    }

    //选择栏目
    public function selectCategory(ContentCategory $category)
    {
        $categories = $category->tree();
        return view('content.article_select_category', compact('categories'));
    }

    public function create(ContentArticle $article,Request $request)
    {
        $category = ContentCategory::find($request->query('category_id'));
        return view('content.article_create', compact('article','category'));
    }

    public function store(ContentArticleRequest $request, ContentArticle $article)
    {
        $article->user()->associate(auth()->user())->fill($request->except('_token'))->save();
        return redirect(route('content.article.index'))->with('success', '文章发表成功');
    }

    public function show(ContentArticle $contentArticle)
    {
        //
    }

    public function edit(ContentArticle $contentArticle)
    {
        //
    }

    public function update(Request $request, ContentArticle $contentArticle)
    {
        //
    }

    public function destroy(ContentArticle $contentArticle)
    {
        //
    }
}
