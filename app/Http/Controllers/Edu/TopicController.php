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

    //前台贴子列表
    public function index()
    {
        $topics = EduTopic::with('category')->paginate(10);
        return view('edu.topic.index', compact('topics'));
    }

    //前台根据分类显示
    public function lists(EduCategory $category)
    {
        $topics = $category->topic()->paginate(10);
        return view('edu.topic.lists', compact('topics', 'category'));
    }

    //贴子管理
    public function manage(Request $request)
    {
        session()->flash('url.intended', $request->getRequestUri());
        $topics = EduTopic::with('category', 'user')->byUserId(auth()->id())->paginate(10);
        return view('edu.topic.manage', compact('topics'));
    }

    public function create(Request $request)
    {
        $category = EduCategory::find($request->query('id'));
        return view('edu.topic.create', compact('category'));
    }

    public function store(EduTopicRequest $request, EduTopic $topic)
    {
        $topic->user()->associate(auth()->user())->fill($request->all())->save();
        return redirect(route('edu.topic.show', $topic))->with('success', '发表成功');
    }

    public function show(EduTopic $topic, Request $request)
    {
        return view('edu.topic.show', compact('topic'));
    }

    public function edit(EduTopic $topic)
    {
        return view('edu.topic.edit', compact('topic'));
    }

    public function update(EduTopicRequest $request, EduTopic $topic)
    {
        $this->authorize('update', $topic);
        $topic->update($request->all());
        return redirect(route('edu.topic.show',$topic))->with('success','修改成功');
    }

    public function destroy(EduTopic $topic)
    {
        $this->authorize('delete', $topic);
        $topic->delete();
        return redirect()->intended(route('edu.topic.index'))->with('success', '删除成功');
    }
}
