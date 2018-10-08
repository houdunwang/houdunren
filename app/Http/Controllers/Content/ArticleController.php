<?php

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Models\ContentArticle;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('content.article_index');
    }

    public function create()
    {

    }

    public function store(Request $request)
    {
        //
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
