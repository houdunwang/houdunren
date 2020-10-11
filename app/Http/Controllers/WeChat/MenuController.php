<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Illuminate\Http\Request;
use App\Models\Site;
use Houdunwang\WeChat\Button;

class MenuController extends Controller
{
  public function edit(Request $request, Site $site, WeChat $wechat)
  {
    return view('wechat.menu.edit', compact('site', 'wechat'));
  }

  public function update(Request $request, Site $site, WeChat $wechat)
  {
    $wechat->menus = $request->input('button');
    $wechat->save();
    return response()->json(['message' => '菜单添加成功']);
  }

  public function push(Site $site, WeChat $wechat, Button $button)
  {
    config(['houdunren.wechat' => $wechat]);
    $button->create(['button' => $wechat->menus]);
    return response()->json(['message' => '微信菜单推送成功，请取关并再次关注后查看效果']);
  }
}
