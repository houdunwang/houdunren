<?php

namespace Modules\WeChat\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\WeChatService;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use LogicException;
use Modules\WeChat\Entities\WeChatText;

/**
 * 文本消息
 * @package Modules\Http\Controllers\Admin
 */
class TextController extends Controller
{
  public function index()
  {
    $texts = WeChatText::site()->module()->get();
    return view('wechat::admin.text.index', compact('texts'));
  }

  public function create()
  {
    return view('wechat::admin.text.create');
  }

  public function store(Request $request, WeChatService $weChatService)
  {
    $this->save();
    return redirect()->route('WeChat.admin.text.index')->with('success', '文本消息添加成功');
  }

  public function edit(WeChatText $text)
  {
    return view('wechat::admin.text.edit', compact('text'));
  }

  public function update(Request $request, WeChatText $text, WeChatService $weChatService)
  {
    $this->save();
    return redirect()->route('WeChat.admin.text.index')->with('success', '文本消息修改成功');
  }

  public function show(Request $request, WeChatText $text)
  {
    return $text;
  }

  /**
   * 保存微信规则
   * @return void
   * @throws BindingResolutionException
   * @throws LogicException
   */
  protected function save()
  {
    $weChatService = app(WeChatService::class);

    $rule = $weChatService->saveRule();
    $text = json_decode(request()->text, true);
    WeChatText::updateOrCreate(['id' => $text['id'] ?? 0], [
      'site_id' => site()['id'],
      'module_id' => module()['id'],
      'rule_id' => $rule['id'],
      'contents' => $text['contents']
    ]);
  }

  public function destroy(WeChatText $text)
  {
    $text->rule->delete();
    $text->delete();
    return ['message' => '文本消息删除成功'];
  }
}
