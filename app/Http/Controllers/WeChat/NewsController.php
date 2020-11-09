<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChatNews;
use App\Services\WeChatService;
use Illuminate\Http\Request;

class NewsController extends Controller
{
  public function index()
  {
    $news = WeChatNews::site()->get();
    return view('wechat.news.index', compact('news'));
  }

  public function create()
  {
    return view('wechat.news.create');
  }

  public function store(Request $request, WeChatService $weChatService, WeChatNews $weChatNews)
  {
    $rule = $weChatService->saveRule('news');

    $weChatNews->site_id = site()['id'];
    $weChatNews->module_id = module()['id'];
    $weChatNews->rule_id = $rule['id'];
    $weChatNews->contents = json_decode($request->contents, true);
    $weChatNews->save();

    return redirect()
      ->route('wechat.news.index')
      ->with('success', '图文消息添加成功');
  }

  public function show(WeChatNews $news)
  {
    return $news;
  }

  public function edit(WeChatNews $news)
  {
    return view('wechat.news.edit', compact('news'));
  }

  public function update(Request $request, WeChatNews $news, WeChatService $weChatService)
  {
    $weChatService->saveRule('news');

    $news->contents = json_decode($request->contents, true);
    $news->save();

    return redirect()
      ->route('wechat.news.index')
      ->with('success', '图文消息修改成功');
  }

  public function destroy(WeChatNews $news)
  {
    $news->rule->delete();
    $news->delete();
    return ['message' => '图文消息删除成功'];
  }
}
