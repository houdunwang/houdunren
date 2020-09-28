<?php

namespace App\Services;

use App\Models\User;
use App\Models\WeChat;
use App\Models\WeChatKeyword;
use App\Models\WeChatRule;
use App\Models\WeChatUser;
use Auth;
use Houdunwang\WeChat\WeChat as WeChatWeChat;
use Socialite;

class WeChatService
{
  public function login(array $account)
  {
    $unionid = $account['unionid'] ?? null;
    $openid = $account['openid'] ?? null;

    if ($unionid) {
      $wechatUser = WeChatUser::where('unionid', $unionid)->first();
    } else {
      $wechatUser = WeChatUser::where('openid', $openid)->first();
    }

    if (!$wechatUser) {
      $user = User::create([
        'avatar' => $account['headimgurl'] ?? null,
        'name' => $account['nickname'] ?? null,
      ]);
      $data = array_merge($account, [
        'user_id' => $user['id'],
        'site_id' => site()['id'],
      ]);

      $wechatUser = WeChatUser::create($data);
    }

    Auth::login($wechatUser->user);
    return $wechatUser;
  }

  public function driver()
  {
    $this->config(null);
    return Socialite::driver(is_wechat() ? 'weixin' : 'weixinweb');
  }

  public function config(?int $wechatId)
  {
    if (!is_null($wechatId)) {
      app(WeChatWeChat::class)->config(is_numeric($wechatId) ? WeChat::find($wechatId) : $wechatId);
    }

    $wechat = WeChat::find(config('site.user.wechat_login_id'));
    if (is_wechat()) {
      config([
        'services.weixin' => [
          'client_id' => $wechat['appID'],
          'client_secret' => $wechat['appsecret'],
          'redirect' => route('auth.login.wechat.callback'),
        ],
      ]);
    } else {
      config([
        'services.weixinweb' => [
          'client_id' => config('site.user.wechatweb_client_id'),
          'client_secret' => config('site.user.wechatweb_client_secret'),
          'redirect' => route('auth.login.wechat.callback'),
        ],
      ]);
    }
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
