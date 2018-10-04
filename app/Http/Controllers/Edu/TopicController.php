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

use App\Http\Requests\TopicRequest;
use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TopicController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    public function index(Request $request)
    {
        $topics = Topic::where('category_id', $request->query('id'))->paginate(20);
        return view('edu.topic_index', compact('topics'));
    }

    public function create(Request $request)
    {
        $category = Category::find($request->query('id'));
        return view('edu.topic_create', compact('category'));
    }

    public function store(TopicRequest $request, Topic $topic)
    {
        $topic->user()->associate(auth()->user())->fill($request->all())->save();
        return redirect(route('edu.topic.show', $topic))->with('success', '发表成功');
    }

    public function show(Topic $topic)
    {
        return view('edu.topic_show', compact('topic'));
    }

    public function edit(Topic $topic)
    {
        //
    }

    public function update(Request $request, Topic $topic)
    {
        //
    }

    public function destroy(Topic $topic)
    {
        //
    }
}
