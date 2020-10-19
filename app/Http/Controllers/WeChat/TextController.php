<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChatKeyword;
use App\Models\WeChatText;
use App\Services\WeChatService;
use Illuminate\Http\Request;

class TextController extends Controller
{
  public function index()
  {
    $texts = WeChatText::site()->module()->get();
    return view('wechat.text.index', compact('texts'));
  }

  public function create()
  {
    return view('wechat.text.create');
  }

  public function show(Request $request, WeChatText $text)
  {
    return $text;
  }

  public function store(Request $request, WeChatService $weChatService)
  {
    $this->save();
    return redirect()->route('wechat.text.index')->with('success', '文本消息添加成功');
  }

  public function edit(WeChatText $text)
  {
    return view('wechat.text.edit', compact('text'));
  }

  public function update(Request $request, WeChatText $text, WeChatService $weChatService)
  {
    $this->save();
    return redirect()->route('wechat.text.index')->with('success', '文本消息修改成功');
  }

  protected function save()
  {
    $weChatService = app(WeChatService::class);

    $rule = $weChatService->save();

    $text = json_decode(request()->text, true);

    WeChatText::updateOrCreate(['id' => $text['id'] ?? 0], [
      'site_id' => site()['id'],
      'module_id' => module()['id'],
      'rule_id' => $rule['id'],
      'contents' => $text['contents']
    ]);
  }

  public function destroy(WeChatText $weChatText)
  {
  }
}
