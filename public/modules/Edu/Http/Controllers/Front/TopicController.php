<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Http\Requests\Front\TopicRequest;
use Modules\Edu\Transformers\Front\TopicResource;

class TopicController extends ApiController
{
  public function index(Request $request)
  {
    $keyword = $request->input('keyword');
    $topics = Topic::latest('id')->when($keyword, function ($query, $keyword) {
      $query->where('title', 'like', "%{$keyword}%");
    })->paginate(15);
    return TopicResource::collection($topics);
  }

  public function store(TopicRequest $request, Topic $topic)
  {
    $topic['site_id'] = SITEID;
    $topic['title'] = $request->input('title');
    $topic['content'] = $request->input('content');
    $topic['user_id'] = Auth::id();
    $topic->save();
    return $this->success('发表成功');
  }

  /**
   * Show the specified resource.
   * @param int $id
   * @return Response
   */
  public function show($id)
  {
    return view('edu::show');
  }

  /**
   * Show the form for editing the specified resource.
   * @param int $id
   * @return Response
   */
  public function edit($id)
  {
    return view('edu::edit');
  }

  /**
   * Update the specified resource in storage.
   * @param Request $request
   * @param int $id
   * @return Response
   */
  public function update(Request $request, $id)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   * @param int $id
   * @return Response
   */
  public function destroy($id)
  {
    //
  }
}
