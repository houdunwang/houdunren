import { http } from '@/plugins/axios'

//评论直播截图
export default () => {
  const getCommentList = () => {
    return http.request<string[]>({
      url: `shot/comment`,
    })
  }

  const getLiveList = () => {
    return http.request<string[]>({
      url: `shot/live`,
    })
  }

  return { getCommentList, getLiveList }
}
