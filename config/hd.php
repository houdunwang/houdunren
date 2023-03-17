<?php
return  [
    "base" => [
        'name' => env('APP_NAME', '后盾人'),
        'domain' => 'houdunren.com',
        'ad' => '后盾人 人人做后盾',
        //禁用图形验证码
        "captcha_disable" => env('CAPTCHA_DISABLE', true),
        "weixin" => 'houdunren2021',
        "email" => '2300071698@qq.com',
        "icp" => env("ICP", '')
    ],
    "aliyun" => [
        "aliyun_key" => env('ALIYUN_KEY'),
        'aliyun_secret' => env('ALIYUN_SECEET'),
        //OSS&CDN配置
        "aliyun_oss_endpoint" => env('ALIYUN_OSS_ENDPOINT'),
        "aliyun_oss_block" => env('ALIYUN_OSS_BLOCK'),
        "cdn_video_key" => env('CDN_VIDEO_KEY'),
        "cdn_video_domain" => env('CDN_VIDEO_DOMAIN'),
        "cdn_image_domain" => env('CDN_IMAGE_DOMAIN')
    ],
    "sms" => [
        //短信签名
        "aliyun_code_sign" => env('ALIYUN_CODE_SIGN'),
        //短信模板
        "aliyun_code_template" => env('ALIYUN_CODE_TEMPLATE', 'SMS_12840367'),
        //短信或邮箱验证码有效秒数
        "code_timeout" => env("CODE_SEND_TIMEOUT", 600),
        //测试手机号
        'mobile' => env('MOBILE'),
    ],
    "email" => [
        'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
        'port' => env('MAIL_PORT', 587),
        'username' => env('MAIL_USERNAME'),
        'password' => env('MAIL_PASSWORD'),
        //测试邮箱
        'email' => env('EMAIL')
    ],
    "wechat" => [
        "appid" => env('WECHAT_APPID'),
        "appsecret" => env('WECHAT_APPSECRET'),
        "token" => env('WECHAT_TOKEN'),
    ],
    "subscribe" => [
        "original_price" => 745,
        "price_year" => env('SUBSCRIBE_PRICE_YEAR'),
        "price_permanent" => env('SUBSCRIBE_PRICE_PERMANENT'),
    ]
];
