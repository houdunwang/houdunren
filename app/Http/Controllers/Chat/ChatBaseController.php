<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Chat\System\Processor;
use App\Http\Controllers\Controller;
use App\Models\ChatBase;
use App\Models\ChatRule;
use App\Servers\ChatServer;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $bases = ChatBase::get();
        return view('chat.base_index', compact('bases'));
    }

    public function create()
    {
        return view('chat.base_create');
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

    public function edit(ChatBase $base)
    {
        return view('chat.base_edit', compact('base'));
    }

    public function update(Request $request, ChatBase $base, ChatServer $chatServer)
    {
        $rule = $chatServer->saveRule('Chat', $base->chat_rule_id);
        $base->fill(['title' => $request->title, 'content' => json_decode($request->contents, true)])->save();
        return redirect(route('chat.base.index'))->with('success', '更新成功');
    }

    public function destroy(ChatBase $chatBase)
    {
        //
    }
}
