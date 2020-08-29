<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Http\Requests\WeChatRequest;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

class WeChatController extends Controller
{
    public function index(Site $site)
    {
        $wechats =  WeChat::where('site_id', $site['id'])->get();
        return view("wechat.wechat.index", compact('site', 'wechats'));
    }

    public function create(Site $site)
    {
        return view("wechat.wechat.create", compact('site'));
    }

    public function store(WeChatRequest $request, Site $site, WeChat $wechat)
    {
        $wechat->site_id = $site['id'];
        $wechat->fill($request->all())->save();
        return redirect()->route('wechat.wechat.index', $site)->with('success', '微信公众号添加成功');
    }
    public function edit(Site $site, WeChat $wechat)
    {
        return view("wechat.wechat.edit", compact('site', 'wechat'));
    }

    public function update(WeChatRequest $request, Site $site, WeChat $wechat)
    {
        $wechat->fill($request->all())->save();
        return redirect()->route('wechat.wechat.index', $site)->with('success', '微信公众号修改成功');
    }

    public function destroy(Site $site, WeChat $wechat)
    {
        $wechat->delete();
        return response()->json(['message' => '公众号删除成功']);
    }
}
