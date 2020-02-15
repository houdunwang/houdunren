export default {
    base: {
        name: { value: "", title: "网站名称", desc: "" },
        logo: { value: "", title: "网站标志", desc: "" },
        keyword: { value: "", title: "网站关键字", desc: "" },
        description: { value: "", title: "网站关键字", desc: "" },
        icp: { value: "", title: "备案号", desc: "" },
        tel: { value: "", title: "联系电话", desc: "" },
        email: { value: "", title: "联系邮箱", desc: "" },
        counter: { value: "", title: "统计代码", desc: "" }
    },
    email: {
        driver: {
            value: "",
            title: "邮箱驱动",
            desc: "smtp、sendmail、mailgun、mandrill、ses、sparkpost、log"
        },
        host: {
            value: "",
            title: "服务器地址",
            desc: "指定SMTP服务器的地址 阿里邮箱 腾讯邮箱"
        },
        port: {
            value: "",
            title: "端口",
            desc: "指定SMTP服务器的地址, 如: 126邮箱为25"
        },
        username: {
            value: "",
            title: "邮箱帐号",
            desc: "发送邮箱登录帐号,一般情况下设置与发送邮箱一样"
        },
        password: { value: "", title: "邮箱密码", desc: "邮箱登录密码" },
        name: { value: "", title: "发件人名称", desc: "发件人的中文名称" },
        address: {
            value: "",
            title: "发送邮箱",
            desc: "收件方回复使用的邮箱，一般设置成和邮箱帐号一至"
        },
        test: {
            mail: {
                value: "",
                title: "测试邮箱",
                desc: "检测邮箱配置的测试邮箱，需要先保存配置后再测试"
            }
        }
    },
    aliyun: {
        regionId: {
            value: "cn-hangzhou",
            title: "regionId",
            desc:
                "根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo"
        },
        accessKeyId: {
            value: "",
            title: "accessKeyId",
            desc:
                "如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"
        },
        accessKeySecret: {
            value: "",
            title: "accessKeySecret",
            desc:
                "如果使用主账号访问，登陆阿里云 AccessKey 管理页面创建、查看 | 如果使用子账号访问，请登录阿里云访问控制控制台查看"
        },
        upload: {
            endpoint: {
                value: "",
                title: "endpoint",
                desc: "在阿里云后台中oss数据块中查看外网访问的EndPoint"
            },
            bucket: { value: "", title: "bucket", desc: "" }
        }
    },
    alipay: {
        app_id: {
            value: "",
            title: "应用ID",
            desc:
                "根据服务器所在区域进行选择 | https://help.aliyun.com/document_detail/40654.html?spm=5176.7114037.1996646101.1.OCtdEo"
        },
        charset: {
            value: "UTF-8",
            title: "编码格式",
            desc: "编码格式一般使用UTF-8不需要更改"
        },
        sign_type: {
            value: "RSA2",
            title: "签名方式",
            desc: "签名方式一般不需要更改"
        },
        gatewayUrl: {
            value: "https://openapi.alipay.com/gateway.do",
            title: "支付宝网关",
            desc: "支付宝网关一般不需要更改"
        },
        merchant_private_key: {
            value: "",
            title: "商户私钥",
            desc: "使用支付宝提供的签名生成工具创建，注意不要有换行"
        },
        alipay_public_key: {
            value: "",
            title: "支付宝公钥",
            desc:
                "支付宝公钥 https://openhome.alipay.com/platform/keyManage.htm "
        }
    },
    upload: {
        drive: { value: "local", title: "上传设置", desc: "" },
        file_size: {
            value: 200000000,
            title: "文件大小",
            desc: "允许上传的文件大小"
        },
        type: {
            value: "jpg,jpeg,gif,png,doc,txt,pem",
            title: "上传类型",
            desc: "请用英文半角逗号分隔文件类型"
        }
    },
    user: {
        drive: { value: ["email"], title: "注册类型", desc: "" },
        captcha: { value: "", title: "验证码", desc: "" },
        avatar: {
            value: false,
            title: "必须设置头像",
            desc: "如果用户没设置头像将强制要求设置"
        }
    },
    notification: {
        timeout: { value: 60, title: "发送间隔", desc: "" },
        aliyun: {
            sign: { value: "", title: "短信签名", desc: "" },
            template: { value: "", title: "短信模板", desc: "" },
            vars: {
                value: "",
                title: "模板变量",
                desc:
                    '如: "code:2019,product:商城"，如果使用 `SMS_12840367` 时不需要设置模板变量'
            },
            test_mobile: {
                value: "",
                title: "短信发送测试",
                desc: "检测配置的测试手机号，需要先保存配置后再测试"
            }
        }
    },
    search: {
        algolia_id: { value: "", title: "Application ID ", desc: "" },
        algolia_secret: { value: "", title: "ALGOLIA_SECRET", desc: "" }
    },
    maintain: {
        close: {
            value: 0,
            title: "暂停访问",
            desc: "网站维护时只有系统超级管理员可以访问"
        },
        message: {
            value: "",
            title: "提示信息",
            desc: "网站临时关闭时提示给用户的友好信息"
        }
    }
};
