<?php

namespace App\Http\Controllers\Article;

use App\Http\Controllers\Controller;
use App\Http\Requests\Article\FieldRequest;
use App\Models\ArticleField;
use App\Models\ArticleModel;
use Illuminate\Http\Request;

class FieldController extends Controller
{
  public function index(ArticleModel $model)
  {
    return view('article.field.index', compact('model'));
  }

  public function create(ArticleModel $model)
  {
    return view("article.field.create", compact('model'));
  }

  public function store(ArticleModel $model, FieldRequest $request, ArticleField $fieldModel)
  {
    $fieldModel->create($request->all() + ['site_id' => site()['id'], 'model_id' => $model['id']]);
    return response()->json(['message' => '字段添加成功']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\ArticleField  $articleField
   * @return \Illuminate\Http\Response
   */
  public function show(ArticleField $articleField)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\ArticleField  $articleField
   * @return \Illuminate\Http\Response
   */
  public function edit(ArticleField $articleField)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\ArticleField  $articleField
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, ArticleField $articleField)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\ArticleField  $articleField
   * @return \Illuminate\Http\Response
   */
  public function destroy(ArticleField $articleField)
  {
    //
  }
}
