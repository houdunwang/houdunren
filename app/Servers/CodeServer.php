<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/10/28
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;


use App\Exceptions\ValidException;
use App\Notifications\CodeNotification;
use App\User;
use Houdunwang\Aliyun\Aliyun;

class CodeServer
{
    public function __construct()
    {
        config(['mail' => config_get('admin.email')]);
    }

    /**
     * 校验验证码
     * @param $account
     * @param $code
     * @return bool
     */
    public function check($account, $code)
    {
        $cache = session()->get('_code');
        return $cache['account'] == $account && $cache['code'] == $code;
    }

    /**
     * 发送验证码
     * @param $account
     * @return boolean
     * @throws ValidException
     */
    public function send($account)
    {
        $this->expire();
        $code = random_number(4);
        switch ($this->type($account)) {
            case 'email':
                User::firstOrNew(['email' => $account])->notify(new CodeNotification($code));
                $this->session($code, 'email', $account);
                break;
            case 'mobile':
                $data = [
                    //短信签名
                    'sign' => '后盾人',
                    //短信模板
                    'template' => 'SMS_15440200',
                    //手机号
                    'mobile' => $account,
                    //模板变量
                    'vars' => ["code" => $code, "product" => "后盾人"],
                ];
                Aliyun::instance('Sms')->send($data);
                $this->session($code, 'mobile', $account);
                break;
        }
        return true;
    }

    /**
     * 获取发送帐号类型
     * @param $account
     * @return string
     * @throws ValidException
     */
    protected function type($account)
    {
        if (filter_var($account, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        } elseif (preg_match('/^\d{11}$/', $account)) {
            return 'mobile';
        }
        throw new ValidException('帐号类型错误');
    }

    /**
     * 保存验证码
     * @param $code
     * @param $type
     * @param $account
     */
    protected function session($code, $type, $account)
    {
        session()->put('_code', [
            'code' => $code,
            'type' => $type,
            'account' => $account,
            'expire' => time() + config_get('admin.base.code_expire'),
        ]);
    }

    /**
     * 检测过期时间
     * @throws ValidException
     */
    protected function expire()
    {
        $expire = session('_code.expire');
        if ($expire && time() < $expire) {
            throw new ValidException('验证码发送频繁，请稍候操作');
        }
    }
}