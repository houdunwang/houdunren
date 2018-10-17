<?php

namespace App\Http\Controllers\Chat;

use App\Http\Controllers\Chat\System\Processor;
use App\Http\Controllers\Controller;
use App\Models\ChatButton;
use App\Servers\ChatServer;
use Houdunwang\WeChat\Build\Button\Button;
use Illuminate\Http\Request;

class ChatButtonController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Chat-button');
    }

    public function index()
    {
        $buttons = ChatButton::get();
        return view('chat.button_index', compact('buttons'));
    }

    public function create()
    {
        return view('chat.button_create');
    }

    public function store(Request $request, ChatServer $chatServer)
    {
        (new ChatButton())->fill([
            'title'   => $request['title'],
            'content' => json_decode($request['content'], true),
        ])->save();
        return redirect(route('chat.button.index'))->with('success', '菜单添加成功');
    }

    public function show(ChatButton $chatButton)
    {
        //
    }

    public function edit(ChatButton $button)
    {
        return view('chat.button_edit', compact('button'));
    }

    public function update(Request $request, ChatButton $button)
    {
        $button->fill([
            'title'   => $request['title'],
            'content' => json_decode($request['content'], true),
        ])->save();
        return redirect(route('chat.button.index'))->with('success', '修改菜单成功');
    }

    public function destroy(ChatButton $chatButton)
    {
        //
    }

    public function push(ChatButton $button, Button $ChatButton)
    {
        $res = $ChatButton->create(['button'=>$button->content]);
        if ($res['errcode']!=0) {
            return back()->with('error', $res['errmsg']);
        }
        return back()->with('success','按钮推送成功，微信APP不一定马上更新。\n你可以选择取消关注再关注后查看效果');
    }
}
