<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Site;
use App\Models\WeChat;

class DefaultController extends Controller
{
    public function edit(Site $site, WeChat $wechat)
    {
        return view('wechat.default.edit', compact('site', 'wechat'));
    }

    public function update(Request $request, Site $site, WeChat $wechat)
    {
        $wechat->fill($request->all())->save();
        return back()->with('success', '默认回复设置成功');
    }
}
