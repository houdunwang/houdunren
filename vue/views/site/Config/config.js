export default {
    base: {
        keywords: '',
        description: '',
        icp: '',
        tel: '',
        email: ''
    },
    user: {
        bind: [],
        avatar: false,
        wechatweb_login: false,
        //微信开发平台使用的登录信息
        wechatweb_client_id: '',
        wechatweb_client_secret: '',
        //微信客户端登录使用的公众号
        wechat_appid: '',
        wechat_appsecret: ''
    },
    aliyun: {
        regionId: 'cn-hangzhou',
        accessKeyId: '',
        accessKeySecret: ''
    },
    alipay: {
        app_id: '',
        charset: 'UTF-8',
        sign_type: '',
        private_key: '',
        ali_public_key: '',
        mode: ''
    },
    wepay: {
        mch_id: '',
        key: '',
        mode: '',
        app_id: '',
        cert_client: '',
        cert_key: ''
    },
    upload: {
        driver: 'local',
        file_size: 200000000,
        extensions: 'jpg,jpeg,gif,png,doc,txt,pem',
        oss: {
            endpoint: '',
            bucket: ''
        },
        local: {
            path: 'Y/m'
        }
    },
    email: {
        transport: 'smtp',
        host: '',
        port: 80,
        username: '',
        password: '',
        encryption: ''
    },
    sms: {
        driver: 'aliyun',
        product: '',
        aliyun: {
            sign: '身份验证',
            template: 'SMS_12840367'
        }
    }
}
