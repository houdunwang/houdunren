<?php

namespace App\Services;

use App\Models\User;
use App\Models\WeChat;
use App\Models\WeChatKeyword;
use App\Models\WeChatRule;

class WeChatService
{
  public function wechatWebLogin()
  {
  }

  public function config(int $id)
  {
    config(['houdunren.wechat' => WeChat::find($id)]);
  }

  public function save($type = 'text', array $options = [])
  {
    $rule = json_decode(request()->input('wechat.rule'), true);
    $rule['site_id'] = site()['id'];
    $rule['module_id'] = module()['id'];
    $rule['title'] = $rule['title'];
    $rule['type'] = $type;
    $rule['options'] = $options;

    $weChatRule = WeChatRule::updateOrCreate(
      ['id' => $rule['id'] ?? 0],
      [
        'site_id' => site()['id'],
        'module_id' => module()['id'],
        'wechat_id' => $rule['wechat_id'],
        'title' => $rule['title'],
        'type' => $type,
        'options' => $options,
      ]
    );

    $this->saveKeyword($weChatRule);

    return $weChatRule;
  }

  protected function saveKeyword(WeChatRule $weChatRule)
  {
    $keywords = json_decode(request()->input('wechat.keywords'), true);
    $weChatRule->keywords()->delete();

    foreach ($keywords as $keyword) {
      if (!$this->keywordIsExists($keyword)) {
        WeChatKeyword::updateOrCreate(
          ['id' => $keyword['id'] ?? 0],
          [
            'site_id' => site()['id'],
            'module_id' => module()['id'],
            'wechat_id' => 1,
            'rule_id' => $weChatRule['id'],
          ] + $keyword
        );
      }
    }
  }

  public function keywordIsExists(array $keyword)
  {
    return WeChatKeyword::where('word', $keyword['word'])
      ->where('site_id', site()['id'])
      ->whereNotIn('id', [$keyword['id'] ?? 0])
      ->exists();
  }
}
