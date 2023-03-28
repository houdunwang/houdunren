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
  [key: string]: Record<string, any>
}

interface ModuleModel {
  [key: string]: Record<string, any>
}
