<?php

namespace App\Services;

use AlibabaCloud\Client\AlibabaCloud;
use Exception;

/**
 * 短信发送服务
 * @package App\Services
 */
class SmsService
{
    protected $accessKeyId;
    protected $accessSecret;
    protected $RegionId;
    protected $SignName;
    public function __construct()
    {
        $this->accessKeyId = config('site.aliyun.accessKeyId.value');
        $this->accessSecret = config('site.aliyun.accessKeySecret.value');
        $this->RegionId = config('site.aliyun.regionId.value');
        $this->SignName = config('site.sms.aliyun.sign.value');
    }

    /**
     * 发送验证码
     * @param mixed $mobile 手机号
     * @return void
     */
    public function code($mobile, $code = null)
    {
        if (!$mobile) {
            abort(500, '手机号格式错误');
        }
        $code = $code ?: rand(1000, 9999);
        $webname = site()['name'];
        return $this->send([
            'PhoneNumbers' => $mobile,
            'TemplateCode' => config('site.sms.aliyun.template.value'),
            'TemplateParam' => ['code' => $code, 'product' => "《${webname}》"],
        ]);
    }

    /**
     * 发送短信
     * @param array $query  发送参数
     * [
     *  'PhoneNumbers' => '手机号',
     *  'TemplateCode' => 'SMS_12840367',
     *  'TemplateParam' => ['code'=>'','product'=>''],
     * ]
     * @return void
     */
    public function send(array $query)
    {
        $query['RegionId'] = $this->RegionId;
        $query['SignName'] = $this->SignName;

        $query['TemplateParam'] = json_encode($query['TemplateParam']);
        AlibabaCloud::accessKeyClient($this->accessKeyId, $this->accessSecret)->regionId('cn-hangzhou')->asDefaultClient();

        try {
            return AlibabaCloud::rpc()
                ->product('Dysmsapi')
                ->version('2017-05-25')
                ->action('SendSms')
                ->method('POST')
                ->host('dysmsapi.aliyuncs.com')
                ->options([
                    'query' => $query,
                ])
                ->request();
        } catch (Exception $e) {
            throw new Exception('短信接口配置错误' . $e->getMessage());
        }
    }
}
