<?php

namespace App\Http\Controllers;

use App\ArticleCategory;
use App\Models\Config;
use App\Tables\ArticleCategory\Handle;

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
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \App\Exceptions\InvalidException
     */
    public function index(ArticleCategory $articleCategory)
    {
        $handle = new Handle(ArticleCategory::find(1));
        $html   = $handle->render();

        return view('home', compact('html'));
    }
}
