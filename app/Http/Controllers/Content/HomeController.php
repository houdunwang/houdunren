<?php

namespace App\Http\Controllers\Content;

use App\Models\ContentArticle;
use App\Models\ContentCategory;
use App\Models\ContentTemplate;
use App\Http\Controllers\Controller;

/**
 * 文章系统前台
 * Class HomeController
 * @package App\Http\Controllers\Content
 */
class HomeController extends Controller
{
    public function __construct(ContentTemplate $contentTemplate)
    {
        $finder = app('view')->getFinder();
        $finder->prependLocation(public_path($contentTemplate->dir));
    }

    /**
     * 网站首页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('index');
    }

    /**
     * 列表页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function lists(ContentCategory $category)
    {
        $articles = $category->article()->paginate(1);
        return view('list', compact('category', 'articles'));
    }

    /**
     * 内容页
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function article(ContentArticle $article)
    {
        return view('article', compact('article'));
    }
}
