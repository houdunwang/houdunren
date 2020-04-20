<?php
return [
    //系统配置
    'system' => [
        'base' => [
            'name' => ['value' => '后台管理', 'title' => '后台名称', 'desc' => '用于游览器标签中显示的名称'],
            'logo' => ['value' => '/images/logo.png', 'title' => '后台标志', 'desc' => '后台系统管理界面的标志，尺寸600X100像素'],
            'footer' => ['value' => '后盾人 人人做后盾 <br/> Powered by hdcms v6 © 2014-2020 www.hdcms.com', 'title' => '后台页脚', 'desc' => '后台页面底部信息支持HTML'],
        ]
    ],
    //站点配置
    'site' => [
        'base' => [
            'logo' => ['value' => [], 'title' => '网站标志', 'desc' => ''],
        ],
        'user' => [
            'bind' => ['value' => [], 'title' => '用户必须绑定', 'desc' => ''],
            'avatar' => ['value' => 0, 'title' => '必须设置头像', 'desc' => '如果用户没设置头像将强制要求设置'],
            'timeout' => ['value' => 60, 'title' => '验证码间隔时间', 'desc' => ''],
        ],
        'aliyun' => [
            'regionId' => ['value' => 'cn-hangzhou', 'title' => 'regionId', 'desc' => '根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo'],
            'accessKeyId' => ['value' => '', 'title' => 'accessKeyId', 'desc' => '如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看'],
            'accessKeySecret' => ['value' => '', 'title' => 'accessKeySecret', 'desc' => '如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看'],
            'upload' => [
                'endpoint' => ['value' => '', 'title' => 'endpoint', 'desc' => '在阿里云后台中oss数据块中查看外网访问的EndPoint'],
                'bucket' => ['value' => '', 'title' => 'bucket', 'desc' => ''],
            ]
        ],
        'alipay' => [
            'app_id' => ['value' => '', 'title' => '应用ID', 'desc' => '根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo'],
            'charset' => ['value' => 'UTF-8', 'title' => '编码格式', 'desc' => '编码格式一般使用UTF-8不需要更改'],
            'sign_type' => ['value' => 'RSA2', 'title' => '签名方式', 'desc' => '签名方式一般不需要更改'],
            'gatewayUrl' => ['value' => 'https://openapi.alipay.com/gateway.do', 'title' => '支付宝网关', 'desc' => '支付宝网关一般不需要更改'],
            'merchant_private_key' => ['value' => '', 'title' => '商户私钥', 'desc' => '使用支付宝提供的签名生成工具创建，注意不要有换行'],
            'alipay_public_key' => ['value' => '', 'title' => '支付宝公钥', 'desc' => '支付宝公钥,查看地址： https://openhome.alipay.com/platform/keyManage.htm 对应APPID下的支付宝公钥。使用支付宝提供的签名生成工具创建,，注意不要有换行'],
        ],
        'upload' => [
            'drive' => ['value' => 'local', 'title' => '上传设置', 'desc' => ''],
            'file_size' => ['value' => 200000000, 'title' => '文件大小', 'desc' => '允许上传的文件大小'],
            'type' => ['value' => 'jpg,jpeg,gif,png,doc,txt,pem,json', 'title' => '上传类型', 'desc' => '请用英文半角逗号分隔文件类型'],
        ],
        'email' => [
            'transport' => ['value' => 'smtp', 'title' => '邮箱驱动', 'desc' => 'smtp、sendmail、mailgun、mandrill、ses、sparkpost、log'],
            'host' => ['value' => 'smtpdm.aliyun.com', 'title' => '服务器地址', 'desc' => '指定SMTP服务器的地址 阿里邮箱 腾讯邮箱'],
            'port' => ['value' => '465', 'title' => '端口', 'desc' => '指定SMTP服务器的地址, 如: 126邮箱为25'],
            'username' => ['value' => '', 'title' => '邮箱帐号', 'desc' => '发送邮箱登录帐号,一般情况下设置与发送邮箱一样'],
            'password' => ['value' => '', 'title' => '邮箱密码', 'desc' => ''],
            'encryption' => ['value' => 'ssl', 'title' => '发送邮箱', 'desc' => '加密方式'],
            'test_mail' => ['value' => '', 'title' => '测试邮箱', 'desc' => '检测邮箱配置的测试邮箱，需要先保存配置后再测试'],
        ],
        'sms' => [
            'aliyun' => [
                'sign' => ['value' => '', 'title' => '短信签名', 'desc' => ''],
                'template' => ['value' => '', 'title' => '验证码模板', 'desc' => ''],
                'test_mobile' => ['value' => '', 'title' => '短信发送测试', 'desc' => '检测配置的测试手机号，需要先保存配置后再测试'],
            ],
        ],
        'wepay' => [
            'mch_id' => ['value' => '', 'title' => '微信支付商户号', 'desc' => '公众号支付请求中用于加密的密钥Key'],
            'key' => ['value' => '', 'title' => '商户支付密钥', 'desc' => '此值需要手动在腾讯商户后台API密钥保持一致。查看设置教程'],
            'apiclient_cert' => ['value' => '', 'title' => '证书格式', 'desc' => ''],
            'apiclient_key' => ['value' => '', 'title' => '证书密钥格式', 'desc' => ''],
            'rootca' => ['value' => '', 'title' => 'CA证书', 'desc' => ''],
        ],
        'search' => [
            'algolia_id' => ['value' => '', 'title' => 'Application ID ', 'desc' => ''],
            'algolia_secret' => ['value' => '', 'title' => 'ALGOLIA_SECRET', 'desc' => ''],
        ]
    ],
    //微信公众号
    'weChat' => [
        'name' => ['value' => '', 'title' => '公众号名称 ', 'desc' => '填写公众号的帐号名称'],
        'account' => ['value' => '', 'title' => '微信号 ', 'desc' => '填写公众号的帐号，一般为英文帐号'],
        'original' => ['value' => '', 'title' => '原始ID ', 'desc' => '请在微信注册信息处查看'],
        'appid' => ['value' => '', 'title' => '开发者ID ', 'desc' => '开发者ID是公众号开发识别码，配合开发者密码可调用公众号的接口能力'],
        'appsecret' => ['value' => '', 'title' => '开发者密码 ', 'desc' => '开发者密码是校验公众号开发者身份的密码，具有极高的安全性。切记勿把密码直接交给第三方开发者或直接存储在代码中。如需第三方代开发公众号，请使用授权方式接入'],
        'original' => ['value' => '', 'title' => '原始ID ', 'desc' => '请在微信注册信息处查看'],
        'token' => ['value' => '', 'title' => 'Token ', 'desc' => '必须为英文或数字，长度为3-32字符'],
        'encodingaeskey' => ['value' => '', 'title' => 'EncodingAESKey ', 'desc' => '消息加密密钥由43位字符组成，可随机修改，字符范围为A-Z，a-z，0-9'],
        'genre' => ['value' => '', 'title' => '公众号类型 ', 'desc' => '注意：即使公众平台显示为“未认证”, 但只要【公众号设置】/【账号详情】下【认证情况】显示资质审核通过, 即可认定为认证号'],
        'qr' => ['value' => '', 'title' => '二维码 ', 'desc' => ''],
        'icon' => ['value' => '', 'title' => '公众号图标 ', 'desc' => ''],
        'message' => [
            'default' => ['value' => '您的消息我们已经收到', 'title' => '默认消息', 'desc' => '公众号没有匹配内容时的默认回复消息，支持微信关键词'],
            'welcome' => ['value' => '感谢您的关注', 'title' => '欢迎消息', 'desc' => '粉丝关注公众号时回复的消息，支持微信关键词']
        ],
    ]
];
