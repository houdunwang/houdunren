interface UserModel {
  id: number
  name: string
  email: string
  mobile: string
  sex: number
  comment_num: number
  fans_num?: number
  follower_num?: number
  real_name?: any
  address?: any
  avatar?: any
  home?: any
  weibo?: any
  wechat?: any
  github?: string
  qq?: any
  wakatime?: string
  openid?: string
  unionid?: string
  email_verified_at: string
  created_at: string
  updated_at: string
  todaySign: SignModel
  duration?: DurationModel
}

interface ConfigModel {
  base: {
    name: string
  }
  copyright: {
    other: string
    ad: string
    weixin: string
    email: string
    icp: string
    showXjAvatar: boolean
  }
  aliyun: {
    aliyun_key: string
    aliyun_secret: string
    aliyun_oss_endpoint: string
    aliyun_oss_block: string
    cdn_video_key: string
    cdn_image_domain: string
    cdn_image_domain: string
    cdn_video_domain: string
  }
  sms: {
    aliyun_code_sign: string
    aliyun_code_template: string
    code_timeout: string
    mobile: string
  }
  email: {
    host: string
    port: string
    username: string
    password: string
    email: string
  }
  wechat: {
    appid: string
    appsecret: string
    token: string
  }

  subscribe: {
    original_price: number
    price_year: number
    price_permanent: number
  }
}
