<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Edu;

use App\Http\Requests\EduTopicRequest;
use App\Models\EduCategory;
use App\Models\EduTopic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show', 'lists']]);
    }

    public function index()
    {
        $topics = EduTopic::with('category')->paginate(10);
        return view('edu.topic_index', compact('topics'));
    }

    //根据分类显示
    public function lists(EduCategory $category)
    {
        $topics = $category->topic()->paginate(10);
        return view('edu.topic_lists', compact('topics', 'category'));
    }

    public function create(Request $request)
    {
        $category = EduCategory::find($request->query('id'));
        return view('edu.topic_create', compact('category'));
    }

    public function store(EduTopicRequest $request, EduTopic $topic)
    {
        $topic->user()->associate(auth()->user())->fill($request->all())->save();
        return redirect(route('edu.topic.show', $topic))->with('success', '发表成功');
    }

    public function show(EduTopic $topic,Request $request)
    {
        session(['url.intended'=>$request->getRequestUri()]);
        return view('edu.topic_show', compact('topic'));
    }

    public function edit(EduTopic $topic)
    {
    }

    public function update(EduTopicRequest $request, EduTopic $topic)
    {
    }

    public function destroy(EduTopic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return redirect(route('edu.topic.index'))->with('success', '删除成功');
    }
}
