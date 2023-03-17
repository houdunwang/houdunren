<?php

namespace App\Services;

use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Dysmsapi;
use AlibabaCloud\SDK\Dysmsapi\V20170525\Models\SendSmsRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;
use Exception;

class AliyunService
{
    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return Dysmsapi Client
     */
    public static function createClient()
    {
        $config = new Config([
            "accessKeyId" => config('hd.aliyun.aliyun_key'),
            "accessKeySecret" => config('hd.aliyun.aliyun_secret')
        ]);
        // 访问的域名
        $config->endpoint = "dysmsapi.aliyuncs.com";
        return new Dysmsapi($config);
    }

    /**
     * 发送短信验证码
     * @param string[] $args
     * @return void
     */
    public static function sms($params)
    {
        $client = self::createClient();
        $sendSmsRequest = new SendSmsRequest([
            "signName" => $params['sign'],
            "templateCode" => $params['template'],
            "phoneNumbers" => $params['phone'],
            "templateParam" => json_encode($params['params'])
        ]);
        $runtime = new RuntimeOptions([]);
        // if (app()->environment('production'))
        $client->sendSmsWithOptions($sendSmsRequest, $runtime);
    }

    //CDN鉴权 URL
    public function videoCdnUrl($path)
    {
        $path = preg_replace('/\?OSSAccessKeyId=.+/i', '', $path);
        if (empty($path)) return;
        $domain = config('hd.aliyun.cdn_video_domain');
        $key = config('hd.aliyun.cdn_video_key');
        $filename = preg_replace('/https?:\/\/.+?(?=\/)/is', '', $path);
        $time = strtotime("+20 minutes");
        $sstring = $filename . "-" . $time . "-0-0-" . $key;
        $auth_key = "auth_key=" . $time . "-0-0-" . md5($sstring);
        return $domain .  $filename . "?" . $auth_key;
    }
}
