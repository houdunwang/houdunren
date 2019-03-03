<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
namespace App\Http\Controllers\Common;

use App\Events\NotificationEvent;
use App\Exceptions\ResponseHttpException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Cache;

class NotificationController extends Controller
{
    /**
     * 发送验证码
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws ResponseHttpException
     */
    public function code(Request $request)
    {
        $code = number_random(5);
        $sessionId = session()->getId();
        $timeout = config_get('notify.message_timeout', 60, 'site');
        if (Cache::has($sessionId . 'codeTimeout')) {
            return response()->json(['message' => '发送过于频繁请稍后再试', 'code' => 0]);
        }
        if (!\Validator::make($request->input(), ['username' => 'required'])) {
            return response()->json(['message' => '帐号类型错误', 'code' => 0]);
        }
        try {
            event(new NotificationEvent([
                'subject' => '验证码',
                'to' => $request->input('username'),
                'message' => '您的验证码是: ' . $code,
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
            return response()->json([
                'message' => '验证码已经发送到 ' . $request->input('username') . ' 请注意查收',
                'code' => 0,
            ], 200);
        } catch (\Exception $e) {
            throw  new ResponseHttpException('系统配置荐错误，无法发送通知。', 500);
        }
    }
}
