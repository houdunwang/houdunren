<?php

namespace App\Services\WeChat;

use App\Models\User;
use App\Models\WeChatKeyword;
use App\Models\WeChatRule;
use App\Models\WeChatUser;
use Houdunwang\WeChat\WeChat as WeChatWeChat;
use Illuminate\Support\Collection;

/**
 * 微信管理服务
 * @package App\Services
 */
class WeChatService
{
    /**
     * 微信检测
     * @return boolean
     */
    public function isWechat(): bool
    {
        return isset($_SERVER['HTTP_USER_AGENT']) && strpos($_SERVER['HTTP_USER_AGENT'], 'MicroMessenger') !== false;
    }

    /**
     * 保存微信用户到数据表
     *
     * @param array $account
     * @return User
     */
    public function saveUser(array $account): User
    {
        //微信粉丝是否已经记录到表
        if ($account['unionid']) {
            $wechatUser = WeChatUser::where('unionid', $account['unionid'] ?? '')->first();
        } else {
            $wechatUser = WeChatUser::where('openid', $account['openid'] ?? '')->first();
        }
        //添加系统用户
        if (!$wechatUser) {
            //用户表
            $user = User::create([
                'avatar' => $account['headimgurl'] ?? null,
                'name' => $account['nickname'] ?? null,
            ] + $account);
            //微信粉丝表
            $wechatUser = WeChatUser::create($account + ['user_id' => $user['id'], 'site_id' => SID]);
        }
        return $wechatUser->user;
    }

    /**
     * 批量保存用户
     * 获取微信粉丝数据时使用
     *
     * @param array $users
     * @return Collection
     */
    // public function batchSaveUsers(array $users): Collection
    // {
    //     return collect($users)->map(function ($user) {
    //         return $this->saveUser($user);
    //     });
    // }

    /**
     * 保存微信规则
     *
     * @param string $type
     * @param array $options
     * @return void
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
     *
     * @param WeChatRule $weChatRule
     * @return void
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
     *
     * @param array $keyword
     * @return void
     */
    public function keywordIsExists(array $keyword)
    {
        return WeChatKeyword::where('word', $keyword['word'])
            ->where('site_id', site()['id'])
            ->whereNotIn('id', [$keyword['id'] ?? 0])
            ->exists();
    }
}
