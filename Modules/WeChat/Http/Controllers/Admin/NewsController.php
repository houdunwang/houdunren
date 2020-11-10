<?php

namespace Modules\WeChat\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\WeChatService;
use Illuminate\Http\Request;
use Modules\WeChat\Entities\WeChatNews;

/**
 * 图文消息
 * @package Modules\WeChat\Http\Controllers
 */
class NewsController extends Controller
{
  public function index()
  {
    $news = WeChatNews::site()->get();
    return view('wechat::admin.news.index', compact('news'));
  }

  public function create()
  {
    return view('wechat::admin.news.create');
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
      ->route('WeChat.admin.news.index')
      ->with('success', '图文消息添加成功');
  }

  public function show(WeChatNews $news)
  {
    return $news;
  }

  public function edit(WeChatNews $news)
  {
    return view('wechat::admin.news.edit', compact('news'));
  }

  public function update(Request $request, WeChatNews $news, WeChatService $weChatService)
  {
    $weChatService->saveRule('news');

    $news->contents = json_decode($request->contents, true);
    $news->save();

    return redirect()
      ->route('WeChat.admin.news.index')
      ->with('success', '图文消息修改成功');
  }

  public function destroy(WeChatNews $news)
  {
    $news->rule->delete();
    $news->delete();
    return ['message' => '图文消息删除成功'];
  }
}
