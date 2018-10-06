<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Chat\System\Processor;
use App\Http\Controllers\Controller;
use App\Models\ChatNews;
use App\Servers\ChatServer;
use Houdunwang\WeChat\WeChat;
use Illuminate\Http\Request;

class ChatNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $news = ChatNews::paginate(2);
        return view('chat.news_index', compact('news'));
    }

    public function create(ChatServer $chatServer)
    {
        $ruleView = $chatServer->view();
        return view('chat.news_create', compact('ruleView'));
    }

    public function store(Request $request, ChatServer $chatServer)
    {
        $rule = $chatServer->saveRule('Chat', Processor::class . '@news');
        app(ChatNews::class)->chatRule()->associate($rule)
            ->fill(['title' => $request->title, 'content' => json_decode($request->content, true)])->save();
        return redirect(route('chat.news.index'))->with('success', '图文消息添加成功');
    }

    public function show(ChatNews $chatNews)
    {
    }

    public function edit(ChatNews $news, ChatServer $chatServer)
    {
        $ruleView = $chatServer->view($news->chatRule);
        return view('chat.news_edit', compact('ruleView', 'news'));
    }

    public function update(Request $request, ChatNews $news, ChatServer $chatServer)
    {
        $rule = $chatServer->saveRule('Chat', Processor::class . '@news', $news->chatRule);
        $news->chatRule()->associate($rule)
            ->fill(['title' => $request->title, 'content' => json_decode($request->content, true)])->save();
        return redirect(route('chat.news.index'))->with('success', '图文消息添加成功');
    }

    public function destroy(ChatNews $news)
    {
        $news->chatRule->delete();
        return redirect(route('chat.news.index'))->with('success', '删除成功');
    }
}
