interface UserModel {
  id: number
  nickname: string
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
  duration?: SubscribeModel
  isSubscribe: boolean
}

interface ConfigModel {
  [key: string]: any
}

interface SystemModel {
  id?: number
  title: string
  type: string
  video_num?: number
  view_num?: number
  lesson_num?: number
  download_address: string
  preview: string
  description: string
  created_at?: string
  updated_at?: string
  order?: number
  lessons?: LessonModel[]
}

interface LessonModel {
  id: number
  title: string
  description: string
  preview: string
  video?: any
  price?: any
  system_id: number
  video_num: number
  download_address?: any
  view_num: number
  comment_num: number
  favour_count: number
  favorite_count: number
  created_at: string
  updated_at: string
  is_favour: boolean
  is_favorite: boolean
  videos: VideoModel[]
  user_play_list?: VideoModel & { pivot: { [key: string]: any } }[]
  system?: SystemModel
}

interface VideoModel {
  id: number
  lesson_id: number
  title: string
  path?: string
  path_cdn?: string
  rank: number
  view_num: number
  comment_num: number
  favour_count: number
  favorite_count: number
  created_at: string
  updated_at: string
  favoriteTotal: number
  lesson: LessonModel
  user: UserModel
  pivot: { created_at: string; updated_at: string }
}

interface CommentModel {
  id: number
  user_id: number
  reply_user_id?: any
  comment_id?: any
  content: string
  html: string
  favour_count: number
  commentable_type: string
  commentable_id: number
  created_at: string
  updated_at: string
  replys: any[]
  reply_user: UserModel
  user: UserModel
}

interface TopicModel {
  id: number
  user_id: number
  title: string
  content: string
  html: string
  favour_count: number
  favorite_count: number
  comment_count: number
  recommend: boolean
  created_at: string
  updated_at: string
  tags: any[]
  user: UserModel
  is_favour: boolean
  is_favorite: boolean
}

interface SignModel {
  id: number
  user_id: number
  mood: string
  content: string
  created_at: string
  updated_at: string
  sign_count: Signcount
  user: UserModel
}

interface SigncountModel {
  id: number
  user_id: number
  month: number
  year: number
  total: number
  created_at: string
  updated_at: string
}

//动态
interface ActivityModel {
  id: number
  log_name: string
  description: string
  subject_type: string
  event: string
  subject_id: number
  causer_type: string
  causer_id: number
  properties: Record<string, any>
  batch_uuid?: any
  created_at: string
  updated_at: string
  user: UserModel
}

interface NotificationModel {
  id: string
  type: string
  notifiable_type: string
  notifiable_id: number
  data: {
    type: string
    model: string
    model_id: number
    title: string
    id: number
  }
  read_at?: any
  created_at: string
  updated_at: string
}

interface OrderModel {
  id: number
  sn: string
  price: string
  cycle: string
}

interface SubscribeModel {
  id: number
  user_id: number
  end_time: string
  created_at?: any
  updated_at: string
  months: number
}

interface MorningModel {
  id: number
  user_id?: any
  user?: UserModel
  image: string
  url: string
  video: string
  state: boolean
  end_time: string
  created_at: string
  updated_at: string
}

interface SoftModel {
  id: number
  title: string
  preview: string
  file: string
  content: string
  created_at: string
  updated_at: string
  github: string
  gitee: string
}

interface QuestionModel {
  id?: number
  user?: UserModel
  description: string
  html?: string
  lists: { title: string }[]
  type: 'radio' | 'checkbox'
  answer: number[]
  category: string
  favour_count: number
  created_at?: string
  updated_at?: string
}

interface QuestionAnswerModel {
  id?: number
  user?: UserModel
  answers: { id: number; answer: number[]; success: boolean }[]
  mark: number
  created_at: string
  updated_at: string
}

interface ShortVideoModel {
  id: number
  title: string
  preview: string
  path: string
  created_at: string
  updated_at: string
}

interface SoftModel {
  title: string
  download: string
  description: string
  content: string
  preview: string
  updated_at: string
  created_at: string
  github: string
  gitee: string
  id: number
}

interface PackageModel {
  id: number
  title: string
  ad: string
  price: string
  original_price: string
  icon: string
  text_color: string
  bg_color: string
  created_at: string
  updated_at: string
}
