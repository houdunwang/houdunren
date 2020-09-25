<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Auth\Controller;
use App\Http\Requests\WeChatRequest;
use App\Models\Site;
use App\Models\WeChat;
use Exception;
use Houdunwang\WeChat\Message;
use Illuminate\Http\Request;

class WeChatController extends Controller
{
  public function index(Request $request, Site $site)
  {
    $wechats = WeChat::where('site_id', $site->id)->get();

    if ($request->expectsJson()) {
      return $wechats;
    }

    return view('wechat.wechat.index', compact('site', 'wechats'));
  }

  public function create(Site $site, WeChat $wechat)
  {
    return view('wechat.wechat.create', compact('site', 'wechat'));
  }

  public function store(WeChatRequest $request, Site $site, WeChat $weChat, Message $message)
  {
    // try {
    $message->config($request->all())->token();
    $weChat->site_id = $site->id;
    $weChat->fill($request->all())->save();
    return redirect()
      ->route('wechat.wechat.index', $site)
      ->with('success', '公众号添加成功');
    // } catch (Exception $e) {
    //   return back()
    //     ->withInput()
    //     ->with('danger', 'appID或appsecret配置错误');
    // }
  }

  public function edit(Site $site, WeChat $wechat)
  {
    return view('wechat.wechat.edit', compact('site', 'wechat'));
  }

  public function update(WeChatRequest $request, Site $site, WeChat $wechat)
  {
    $wechat->fill($request->all())->save();
    return redirect()
      ->route('wechat.wechat.index', $site)
      ->with('success', '公众号添加成功');
  }

  public function destroy(Site $site, WeChat $wechat)
  {
    $wechat->delete();
    return response()->json(['message' => '删除成功']);
  }
}
