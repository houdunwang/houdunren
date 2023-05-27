import { http } from '@/plugins/axios'
import { useTitle } from '@vueuse/core'

export default () => {
  const collection = ref<ApiPage<VideoModel>>()
  const model = ref<VideoModel>()

  const findAll = async (page: any) => {
    collection.value = await http.request<ApiPage<VideoModel>>({
      url: `video?page=${page}`,
    })
  }

  //获取课程视频
  const getLessonVideo = async (lessonId: any) => {
    return await http.request<VideoModel[]>({
      url: `video/lesson/${lessonId}`,
    })
  }

  const findOne = async (id: any) => {
    model.value = await http.request<VideoModel>({
      url: `video/${id}`,
    })
    const title = useTitle(null)
    title.value = model.value.title
  }

  const preVideo = computed<VideoModel | undefined>(() => {
    const videos = model.value?.lesson?.videos!
    const index = videos.findIndex((v) => v.id == model.value?.id) as number
    return videos[index - 1]
  })

  const nextVideo = computed<VideoModel | undefined>(() => {
    const videos = model.value?.lesson?.videos!
    const index = videos.findIndex((v) => v.id == model.value?.id) as number
    return videos[index + 1]
  })

  const search = async (content: any, page: any) => {
    collection.value = await http.request<ApiPage<VideoModel>>({
      url: `video/search?content=${content}&page=${page}`,
    })
  }
  return {
    model,
    findOne,
    preVideo,
    nextVideo,
    findAll,
    collection,
    getLessonVideo,
    search,
  }
}
