<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Tables\ArticleCategory\ArticleCategoryHandle;
use App\Tables\ArticleCategory\Handle;
use Spatie\Permission\Models\Permission;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * @param \App\ArticleCategory $articleCategory
     * @param \Request             $request
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(ArticleCategory $articleCategory, \Request $request)
    {
        $handle = new ArticleCategoryHandle(ArticleCategory::find(1));
        $html   = $handle->render();

        return view('home', compact('html'));
    }
}
