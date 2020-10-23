<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Auth\Controller;
use App\Models\ArticleContent;
use Illuminate\Http\Request;

class ContentController extends Controller
{
  public function index()
  {
    $contents = ArticleContent::where('site_id', site()['id'])->paginate();
    return view('article.content.index', compact('contents'));
  }

  public function create()
  {
    return view('article.content.create');
  }

  public function store(Request $request)
  {
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ArticleContent  $articleContent
   * @return \Illuminate\Http\Response
   */
  public function show(ArticleContent $articleContent)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ArticleContent  $articleContent
   * @return \Illuminate\Http\Response
   */
  public function edit(ArticleContent $articleContent)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ArticleContent  $articleContent
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ArticleContent $articleContent)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ArticleContent  $articleContent
   * @return \Illuminate\Http\Response
   */
  public function destroy(ArticleContent $articleContent)
  {
    //
  }
}
