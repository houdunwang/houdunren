<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Events\NotificationEvent;
use App\Exceptions\ResponseHttpException;
use Cache;
use App\Models\Validation;

/**
 * 通知
 * Class NotifyServer
 * @package App\Servers
 */
class NotifyServer
{
    /**
     * 发送验证码
     * @param string $username
     * @return \Illuminate\Http\JsonResponse
     * @throws \App\Exceptions\ResponseHttpException
     */
    /**
     * @param string $username
     * @param int $len
     * @return bool
     * @throws ResponseHttpException
     */
    public function code(string $username, int $len = 4)
    {
        $code = number_random($len);
        $sessionId = session()->getId();
        $timeout = config_get('notify.message_timeout', 60, 'site');
        if (Cache::has($sessionId . 'codeTimeout')) {
            throw new ResponseHttpException('发送过于频繁请稍后再试');
        }
        try {
            event(new NotificationEvent([
                'subject' => '验证码',
                'to' => $username,
                'message' => '您的验证码是: ' . $code . ',验证码在10分钟内有效',
                //==========短信配置==========
                //短信签名
                'sign' => config_get('notify.sign', '', 'site'),
                //短信模板
                'template' => config_get('notify.template', '', 'site'),
                //模板变量
                'vars' => ["code" => $code, "product" => site()['name']],
            ]));
            Cache::put($sessionId . 'code', $code, 30);
            Cache::put($sessionId . 'codeTimeout', 'code', now()->addSecond($timeout));
            app(Validation::class)->create([
                'account' => $username,
                'code' => $code,
            ]);
            return true;
        } catch (\Exception $e) {
            throw  new ResponseHttpException('系统配置荐错误，无法发送通知。', 500);
        }
    }
    /**
     * 验证码检测
     * 包括存在与过期检测
     *
     * @param string $account
     * @param string $code
     * @return void
     */
    public function validate(string $account, string $code)
    {
        $notify = app(Validation::class)->where(
            [
                ['account', $account],
                ['code', $code]
            ]
        )->latest()->first();
        return $notify && $notify->created_at > now()->subMinute(10);
    }
}
