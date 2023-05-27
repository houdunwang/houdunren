import { http } from '@/plugins/axios'

export default () => {
  //全站视频学习动态
  const videoDynamics = async () => {
    return await http.request<
      {
        id: number
        created_at: string
        updated_at: string
        user: UserModel
        video: VideoModel
      }[]
    >({ url: `learn/history/videos` })
  }

  //课程学习的视频历史
  const lessonVideo = async (lessonId: any) => {
    return await http.request<VideoModel[]>({
      url: `learn/history/lessonVideos/${lessonId}`,
    })
  }

  //用户学习视频历史
  const userVideos = async (uid: any, page: any = 1) => {
    return await http.request<ApiPage<VideoModel>>({
      url: `learn/history/user/${uid}?page=${page}`,
    })
  }

  return {
    videoDynamics,
    lessonVideo,
    userVideos,
  }
}
