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
        wechatweb_login: false
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
        },
        abc: '3333'
    },
    game: {
        name: 'wzry'
    },
    hd: {
        name: 'hd'
    }
}
