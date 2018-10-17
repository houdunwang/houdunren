<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Chat\System\Processor;
use App\Http\Controllers\Controller;
use App\Models\ChatBase;
use App\Servers\ChatServer;
use Illuminate\Http\Request;

class ChatBaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Chat-text');
    }

    public function index()
    {
        $bases = ChatBase::get();
        return view('chat.base_index', compact('bases'));
    }

    public function create(ChatServer $chatServer)
    {
        $ruleView = $chatServer->view();
        return view('chat.base_create', compact('ruleView'));
    }

    public function store(Request $request, ChatServer $chatServer)
    {
        $rule = $chatServer->saveRule('Chat', Processor::class . '@base');
        app(ChatBase::class)->chatRule()->associate($rule)
            ->fill(['title' => $request->title, 'content' => json_decode($request->contents, true)])->save();
        return redirect(route('chat.base.index'))->with('success', '文本消息添加成功');
    }

    public function show(ChatBase $chatBase)
    {
        //
    }

    public function edit(ChatBase $base, ChatServer $chatServer)
    {
        $ruleView = $chatServer->view($base->chatRule);
        return view('chat.base_edit', compact('base', 'ruleView'));
    }

    public function update(Request $request, ChatBase $base, ChatServer $chatServer)
    {
        $chatServer->saveRule('Chat', Processor::class . '@base', $base->chatRule);
        $base->fill(['title' => $request->title, 'content' => json_decode($request->contents, true)])->save();
        return redirect(route('chat.base.index'))->with('success', '更新成功');
    }

    public function destroy(ChatBase $base)
    {
        $base->chatRule->delete();
        return redirect(route('chat.base.index'))->with('success', '删除成功');
    }
}
