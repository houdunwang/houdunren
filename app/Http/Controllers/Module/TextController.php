<?php

namespace App\Http\Controllers\Module;

use App\Models\Text;
use App\Servers\ChatServer;
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

    public function create(Text $text)
    {
        return view('module.text.create',compact('text'));
    }

    public function store(Request $request, ChatServer $server)
    {
        $data = $request->input();
        $data['site_id'] = site()['id'];
        $data['module_id'] = module()['id'];

        //保存微信数据
        \DB::beginTransaction();
        $server->save(Text::create($data));
        \DB::commit();
        return redirect(module_link('module.text.index'))->with('success', '保存成功');
    }

    public function edit(Text $text)
    {
        return view('module.text.edit', compact('text'));
    }

    public function update(Request $request, Text $text, ChatServer $server)
    {
        \DB::beginTransaction();
        $text->update($request->input());
        $server->save($text);
        \DB::commit();
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
