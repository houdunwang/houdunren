<?php

namespace App\Services;

use AlibabaCloud\SDK\Sts\V20150401\Sts;
use \Exception;
use AlibabaCloud\Tea\Exception\TeaError;
use AlibabaCloud\Tea\Utils\Utils;
use Darabonba\OpenApi\Models\Config;
use AlibabaCloud\SDK\Sts\V20150401\Models\AssumeRoleRequest;
use AlibabaCloud\Tea\Utils\Utils\RuntimeOptions;

class AliyunStsService
{

    /**
     * 使用AK&SK初始化账号Client
     * @param string $accessKeyId
     * @param string $accessKeySecret
     * @return Sts Client
     */
    public static function createClient($accessKeyId, $accessKeySecret)
    {
        $config = new Config([
            // 必填，您的 AccessKey ID
            "accessKeyId" => $accessKeyId,
            // 必填，您的 AccessKey Secret
            "accessKeySecret" => $accessKeySecret
        ]);
        // 访问的域名
        $config->endpoint = "sts.cn-hangzhou.aliyuncs.com";
        return new Sts($config);
    }

    /**
     * @param string[] $args
     * @return void
     */
    public static function main()
    {
        // 初始化 Client，采用 AK&SK 鉴权访问的方式，此方式可能会存在泄漏风险，建议使用 STS 方式。鉴权访问方式请参考：https://help.aliyun.com/document_detail/311677.html
        // 获取 AK 链接：https://usercenter.console.aliyun.com
        $client = self::createClient('LTAI5t9CATDCxNE6AdVBDDJc', '4kSu81bNKOO8fVBwmxr9aI7aIV7VTj');
        $assumeRoleRequest = new AssumeRoleRequest([
            "roleArn" => "acs:ram::297600:role/aliyun-hd",
            "roleSessionName" => "houdunren"
        ]);
        $runtime = new RuntimeOptions([]);
        try {
            // 复制代码运行请自行打印 API 的返回值
            $client->assumeRoleWithOptions($assumeRoleRequest, $runtime);
        } catch (Exception $error) {
            if (!($error instanceof TeaError)) {
                $error = new TeaError([], $error->getMessage(), $error->getCode(), $error);
            }
            // 如有需要，请打印 error
            Utils::assertAsString($error->message);
        }
    }
}
