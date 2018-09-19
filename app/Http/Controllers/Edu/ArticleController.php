<?php

namespace App\Http\Controllers\Edu;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Notifications\UserNotification;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index()
    {
        $articles = Article::with(['user'])->paginate(20);
        return view('edu.article_index', compact('articles'));
    }

    public function create()
    {
        return view('edu.article_create');
    }

    public function store(Request $request, Article $article)
    {
        $article->user()->associate(auth()->user())->fill($request->all())->save();
        return redirect(route('edu.article.show', $article))->with('success', '发表成功');
    }

    public function show(Article $article)
    {
        $zans = $article->zan()->get();

        return view('edu.article_show', compact('article', 'zans'));
    }

    public function edit(Article $article)
    {
        //
    }

    public function update(Request $request, Article $article)
    {
        //
    }

    public function destroy(Article $article)
    {
        //
    }
}
