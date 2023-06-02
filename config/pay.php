<?php

use Yansongda\Pay\Pay;

return [
    'alipay' => [
        'default' => [
            // 必填-支付宝分配的 app_id
            'app_id' => env('ALIPAY_APP_ID'),
            // 必填-应用私钥 字符串或路径
            'app_secret_cert' => env('ALIPAY_APP_SECRET_CRET'),
            // 必填-应用公钥证书 文件类似：appCertPublicKey_2017xxxx.crt
            'app_public_cert_path' => base_path(env('ALIPAY_APP_PUBLIC_CERT_PATH')),
            // 必填-支付宝公钥证书 文件类似：ertPublicKey_RSA2.crt
            'alipay_public_cert_path' => base_path(env('ALIPAY_PUBLIC_CERT_PATH')),
            // 必填-支付宝根证书 文件类似：crt/alipayRootCert.crt
            'alipay_root_cert_path' => base_path(env('ALIPAY_ROOT_CERT_PATH')),
            'return_url' => '',
            'notify_url' => '',
            // 选填-第三方应用授权token
            'app_auth_token' => '',
            // 选填-服务商模式下的服务商 id，当 mode 为 Pay::MODE_SERVICE 时使用该参数
            'service_provider_id' => '',
            // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SANDBOX, MODE_SERVICE
            'mode' => Pay::MODE_NORMAL,
        ]
    ],
    'wepay' => [
        'default' => [
            // 必填-商户号，服务商模式下为服务商商户号
            'mch_id' => env("WEPAY_MCH_ID"),
            // 必填-商户秘钥 key 访问微信支付网站 [帐户中心>API 安全>设置 API 密钥]，要使用 **APIv3** 版本的
            'mch_secret_key' => env('WEPAY_MCH_SECRET_KEY'),
            // 必填-商户私钥 字符串或路径 微信支付证书工具生成的 apiclient_key.pem 文件
            'mch_secret_cert' =>  base_path(env("WEPAY_MCH_SECRET_CERT")),
            // 必填-商户公钥证书路径 微信支付证书工具生成的 apiclient_cert.pem 文件
            'mch_public_cert_path' => base_path(env("WEPAY_PUBLIC_CERT_PATH")),
            // 必填
            'notify_url' => '',
            // 选填-公众号 的 app_id
            'mp_app_id' => 'wxc47243ed572e273d',
            // 选填-小程序 的 app_id
            'mini_app_id' => '',
            // 选填-app 的 app_id
            'app_id' => '',
            // 选填-合单 app_id
            'combine_app_id' => '',
            // 选填-合单商户号
            'combine_mch_id' => '',
            // 选填-服务商模式下，子公众号 的 app_id
            'sub_mp_app_id' => '',
            // 选填-服务商模式下，子 app 的 app_id
            'sub_app_id' => '',
            // 选填-服务商模式下，子小程序 的 app_id
            'sub_mini_app_id' => '',
            // 选填-服务商模式下，子商户id
            'sub_mch_id' => '',
            // 选填-微信公钥证书路径, optional，强烈建议 php-fpm 模式下配置此参数
            'wechat_public_cert_path' => [
                '45F59D4DABF31918AFCEC556D5D2C6E376675D57' => __DIR__ . '/Cert/wechatPublicKey.crt',
            ],
            // 选填-默认为正常模式。可选为： MODE_NORMAL, MODE_SERVICE
            'mode' => Pay::MODE_NORMAL,
        ]
    ],
    'unipay' => [
        'default' => [
            // 必填-商户号
            'mch_id' => '777290058167151',
            // 必填-商户公私钥
            'mch_cert_path' => __DIR__ . '/Cert/unipayAppCert.pfx',
            // 必填-商户公私钥密码
            'mch_cert_password' => '000000',
            // 必填-银联公钥证书路径
            'unipay_public_cert_path' => __DIR__ . '/Cert/unipayCertPublicKey.cer',
            // 必填
            'return_url' => 'https://yansongda.cn/unipay/return',
            // 必填
            'notify_url' => 'https://yansongda.cn/unipay/notify',
        ],
    ],
    'logger' => [
        'enable' => false,
        'file' => base_path('logs/pay.log'),
        'level' => 'info', // 建议生产环境等级调整为 info，开发环境为 debug
        'type' => 'single', // optional, 可选 daily.
        'max_file' => 30, // optional, 当 type 为 daily 时有效，默认 30 天
    ],
    'http' => [ // optional
        'timeout' => 5.0,
        'connect_timeout' => 5.0,
        // 更多配置项请参考 [Guzzle](https://guzzle-cn.readthedocs.io/zh_CN/latest/request-options.html)
    ],
];
