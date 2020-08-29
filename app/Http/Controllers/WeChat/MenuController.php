<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\WeChat;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function edit(Request $request, Site $site, WeChat $wechat)
    {
        return view('wechat.menu.edit', compact('site', 'wechat'));
    }

    public function update(Request $request, Site $site, WeChat $wechat)
    {
    }
}
