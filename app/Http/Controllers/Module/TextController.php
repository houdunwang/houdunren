<?php

namespace App\Http\Controllers\Module;

use App\Models\Text;
use App\Servers\WeChatServer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

/**
 * 模块回复列表处理
 * Class TextController
 * @package App\Http\Controllers\Module
 */
class TextController extends Controller
{
    public function index(Text $text)
    {
        $texts = $text->site()->module()->paginate();
        return view('module.text.index', compact('texts'));
    }

    public function create()
    {
        return view('module.text.create');
    }

    public function store(Request $request, WeChatServer $server,Text $text)
    {
        //保存微信数据
        $server->save($text);
        return redirect(module_link('module.text.index'))->with('success', '保存成功');
    }

    public function show($id)
    {
    }

    public function edit(Text $text)
    {
        return view('module.text.edit', compact('text'));
    }

    public function update(Request $request, Text $text, WeChatServer $server)
    {
        $text->update($request->input());
        $server->save($text);
        return redirect(module_link('module.text.index'))->with('success', '保存成功');
    }

    public function destroy(Text $text)
    {
        \DB::transaction(function () use ($text) {
            $text->keyword->delete();
            $text->delete();
        });
        return back()->with('success', '删除成功');
    }
}
