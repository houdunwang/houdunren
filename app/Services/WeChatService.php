<?php

namespace App\Services;

use App\Models\User;
use App\Models\WeChat;
use App\Models\WeChatKeyword;
use App\Models\WeChatRule;
use App\Models\WeChatUser;
use Auth;
use Houdunwang\WeChat\WeChat as WeChatWeChat;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Support\Collection;
use InvalidArgumentException;
use LogicException;
use RuntimeException;
use Socialite;

/**
 * 微信管理服务
 * @package App\Services
 */
class WeChatService
{
  /**
   * 微信登录
   * @param array $account
   * @return void
   * @throws BindingResolutionException
   * @throws LogicException
   * @throws RuntimeException
   */
  public function login(array $account): void
  {
    $user = $this->saveUser($account)->user;
    Auth::login($user);
  }

  /**
   * 登录用户保存
   * @param array $account
   * @return User
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function saveUser(array $account): User
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
    return $wechatUser->user;
  }

  /**
   * 批量保存用户
   * 获取微信粉丝数据时使用
   * @param array $users
   * @return Collection
   */
  public function batchSaveUsers(array $users)
  {
    return collect($users)->map(function ($user) {
      return $this->saveUser($user);
    });
  }

  /**
   * 微信登录驱动
   * @return mixed
   * @throws BindingResolutionException
   * @throws InvalidArgumentException
   */
  public function driver()
  {
    $this->config();
    return Socialite::driver(is_wechat() ? 'weixin' : 'weixinweb');
  }

  /**
   * 微信服务配置
   * @param mixed|null $wechat
   * @return void
   * @throws BindingResolutionException
   */
  public function config($wechat = null)
  {
    if (!is_null($wechat)) {
      app(WeChatWeChat::class)->config(is_numeric($wechat) ? WeChat::find($wechat) : $wechat);
    }

    $this->loginConfig();
  }

  /**
   * 微信登录配置
   * @return void
   * @throws BindingResolutionException
   */
  public function loginConfig()
  {
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

  /**
   * 保存微信规则
   * @param string $type
   * @param array $options
   * @return mixed
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function saveRule($type = 'text', array $options = [])
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

  /**
   * 保存关键词
   * @param WeChatRule $weChatRule
   * @return void
   * @throws BindingResolutionException
   * @throws LogicException
   */
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

  /**
   * 检测关键词是否存在
   * @param array $keyword
   * @return mixed
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function keywordIsExists(array $keyword)
  {
    return WeChatKeyword::where('word', $keyword['word'])
      ->where('site_id', site()['id'])
      ->whereNotIn('id', [$keyword['id'] ?? 0])
      ->exists();
  }
}
