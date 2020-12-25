export default {
    base: {},
    user: {
        bind: [],
        wechatweb_login: false,
        avatar: false
    },
    aliyun: {
        oss: {}
    },
    alipay: {
        charset: 'UTF-8'
    },
    wepay: {},
    upload: {
        file_size: 200000000,
        extensions: 'jpg,jpeg,gif,png,doc,txt,pem'
    },
    email: {
        transport: 'smtp',
        port: 465,
        encryption: 'ssl'
    },
    sms: {
        aliyun: {}
    }
}
